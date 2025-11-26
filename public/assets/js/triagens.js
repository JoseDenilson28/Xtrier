// trigens.js (substituir todo o conteúdo por este)
document.addEventListener("DOMContentLoaded", () => {

    let paginaAtual = 1;
    let idTriagemSelecionada = null;

    const tbody = document.getElementById('lista-triagens');
    const paginacao = document.getElementById("paginacao");
    const modalEnc = document.getElementById("modalEncaminhar");
    const cancelarModalBtn = document.getElementById("cancelarModalBtn");
    const confirmarEncaminharBtn = document.getElementById("confirmarEncaminharBtn");
    const selectDoutor = document.getElementById("selectDoutor");

    // modal da nova triagem (exposto globalmente abaixo)
    const triagemModal = document.getElementById('triagemModal');

    /* === Função principal: carregar triagens paginadas (somente 4 por página no servidor) === */
    function carregarTriagens(pagina = 1) {
        fetch(`/Xtrier/public/recepcionista/listarTriagensAbertasAjax?pagina=${pagina}`)
            .then(res => {
                if (!res.ok) throw new Error("Resposta inválida do servidor");
                return res.json();
            })
            .then(data => {
                if (!data || !Array.isArray(data.triagens)) {
                    tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4">Erro ao carregar triagens.</td></tr>`;
                    return;
                }

                // monta linhas com map + join (mais eficiente que +=)
                if (data.triagens.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4">Nenhuma triagem aberta.</td></tr>`;
                } else {
                    tbody.innerHTML = data.triagens.map(t => {
                        const cor = {
                            alta: "bg-red-200 text-red-800",
                            media: "bg-yellow-200 text-yellow-800",
                            baixa: "bg-green-200 text-green-800"
                        }[t.prioridade] || "bg-gray-200";

                        return `
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">${t.triagem_id}</td>
                                <td class="px-4 py-2">${t.paciente_nome}</td>
                                <td class="px-4 py-2">${t.sintomas}</td>
                                <td class="px-4 py-2">
                                    <span class="px-2 py-1 rounded-full ${cor} font-semibold">
                                        ${t.prioridade}
                                    </span>
                                </td>
                                <td class="px-4 py-2">${t.criado_em}</td>
                                <td class="px-4 py-2 flex justify-center space-x-2">
                                    <button class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 btn-encaminhar"
                                        data-id="${t.triagem_id}">
                                        Encaminhar
                                    </button>
                                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 btn-cancelar"
                                        data-id="${t.triagem_id}">
                                        Cancelar
                                    </button>
                                </td>
                            </tr>
                        `;
                    }).join("");
                }

                paginaAtual = data.paginaAtual || 1;
                renderPaginacao(data.totalPaginas || 1);
                registrarEventosBotoes();
            })
            .catch(err => {
                console.error("Erro ao carregar triagens:", err);
                tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4">Erro ao carregar triagens.</td></tr>`;
            });
    }

    /* === Paginação (cria botões e listeneres dinamicamente) === */
    function renderPaginacao(totalPaginas) {
        paginacao.innerHTML = "";
        totalPaginas = Math.max(1, totalPaginas || 1);

        for (let p = 1; p <= totalPaginas; p++) {
            const button = document.createElement("button");
            button.className = `px-3 py-1 mx-1 rounded ${p === paginaAtual ? 'bg-green-600 text-white' : 'bg-gray-200'}`;
            button.textContent = p;
            button.addEventListener("click", () => {
                if (p === paginaAtual) return;
                carregarTriagens(p);
            });
            paginacao.appendChild(button);
        }
    }

    /* === Registra eventos dos botões gerados dinamicamente === */
    function registrarEventosBotoes() {
        document.querySelectorAll(".btn-encaminhar").forEach(btn =>
            btn.removeEventListener("click", abrirEncaminharWrapper) // safe remove
        );
        document.querySelectorAll(".btn-cancelar").forEach(btn =>
            btn.removeEventListener("click", cancelarWrapper)
        );

        document.querySelectorAll(".btn-encaminhar").forEach(btn =>
            btn.addEventListener("click", abrirEncaminharWrapper)
        );
        document.querySelectorAll(".btn-cancelar").forEach(btn =>
            btn.addEventListener("click", cancelarWrapper)
        );
    }

    // wrappers para permitir removeEventListener anterior
    function abrirEncaminharWrapper(e) {
        const id = e.currentTarget.dataset.id;
        abrirModalEncaminhar(id);
    }
    function cancelarWrapper(e) {
        const id = e.currentTarget.dataset.id;
        cancelarTriagem(id);
    }

    /* === Modal encaminhar === */
    function abrirModalEncaminhar(id) {
        idTriagemSelecionada = id;
        const numeroSpan = document.getElementById("numeroTriagem");
        if (numeroSpan) numeroSpan.innerText = `#${id}`;
        modalEnc.classList.remove("hidden");
        carregarDoutores();
    }

    cancelarModalBtn && cancelarModalBtn.addEventListener("click", () => {
        modalEnc.classList.add("hidden");
    });

    function carregarDoutores() {
        fetch(`/Xtrier/public/recepcionista/listarDoutoresAjax?status=livre&limit=5`)
            .then(res => {
                if (!res.ok) throw new Error("Erro ao buscar doutores");
                return res.json();
            })
            .then(data => {
                if (!data || data.length === 0) {
                    selectDoutor.innerHTML = `<option value="">Nenhum doutor disponível...</option>`;
                    return;
                }

                selectDoutor.innerHTML = `<option value="">Selecione...</option>` +
                    data.slice(0, 5).map(d => `<option value="${d.id}">${d.nome}</option>`).join("");
            })
            .catch(err => {
                console.error("Erro ao carregar doutores:", err);
                selectDoutor.innerHTML = `<option value="">Erro ao carregar...</option>`;
            });
    }

    confirmarEncaminharBtn && confirmarEncaminharBtn.addEventListener("click", () => {
        const doutor = selectDoutor.value;
        if (!doutor) {
            alert("Selecione um doutor!");
            return;
        }

        fetch("/Xtrier/public/recepcionista/encaminharTriagem", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                triagem_id: idTriagemSelecionada,
                doutor_id: doutor
            })
        })
            .then(res => res.json())
            .then(res => {
                alert(res.mensagem || "Encaminhada com sucesso");
                modalEnc.classList.add("hidden");
                carregarTriagens(paginaAtual);
            })
            .catch(err => {
                console.error("Erro no encaminhar:", err);
                alert("Erro ao encaminhar.");
            });
    });

    /* === Cancelar triagem === */
    function cancelarTriagem(id) {
        if (!confirm("Deseja realmente cancelar esta Triagem?")) return;

        fetch(`/Xtrier/public/recepcionista/cancelarTriagem`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ triagem_id: id })
        })
            .then(res => res.json())
            .then(res => {
                alert(res.mensagem || "Triagem cancelada");
                carregarTriagens(paginaAtual);
            })
            .catch(err => {
                console.error("Erro ao cancelar triagem:", err);
                alert("Erro ao cancelar.");
            });
    }

    /* === Expor funções globais para compatibilidade com onclick inline === */
    window.openModal = function () {
        if (!triagemModal) return;
        triagemModal.classList.remove('hidden');
        triagemModal.classList.add('flex');
    };

    window.closeModal = function () {
        if (!triagemModal) return;
        triagemModal.classList.add('hidden');
        triagemModal.classList.remove('flex');
    };

    /* === Inicializa === */
    carregarTriagens();
});
