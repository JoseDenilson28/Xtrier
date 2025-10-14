1. 📊 Dashboard (Painel Principal)

📁 views/recepcao/dashboard.php

Exibe:

Resumo do dia (triagens, pacientes, consultas…)

Lista de triagens recentes

Agenda do dia

Atalhos rápidos
✅ Função: ser o “centro de controle” da recepção.

🧾 2. 🧍 Pacientes

📁 views/recepcao/pacientes.php
📁 views/recepcao/novo_paciente.php (ou modal)
📁 views/recepcao/editar_paciente.php (opcional)

Listar pacientes cadastrados.

Cadastrar novos pacientes.

Editar dados de um paciente existente.

Buscar pacientes por nome ou telefone.

✅ Função: manter os dados dos pacientes atualizados e acessíveis rapidamente.

📝 3. 🩺 Triagens

📁 views/recepcao/triagens.php
📁 views/recepcao/nova_triagem.php (ou modal)
📁 views/recepcao/detalhes_triagem.php (opcional)

Visualizar todas as triagens abertas e concluídas.

Cadastrar nova triagem (identificar paciente + motivo + prioridade).

Encaminhar triagem para o doutor.

Cancelar ou reagendar triagem.

✅ Função: organizar o fluxo de atendimento e controlar prioridades.

📅 4. 🦷 Consultas / Agenda

📁 views/recepcao/agenda.php
📁 views/recepcao/agendar_consulta.php (ou modal)

Ver agenda de consultas do dia e futuras.

Agendar nova consulta para um paciente.

Confirmar, remarcar ou cancelar consultas.

Filtrar por data e doutor.

✅ Função: gerenciar horários e evitar sobreposição de atendimentos.

🧭 5. 📄 Histórico (opcional)

📁 views/recepcao/historico.php

Visualizar histórico de atendimentos, triagens e consultas passadas.

Buscar por paciente, data ou doutor.
✅ Função: controle administrativo e estatístico.

⚙️ 6. 👤 Perfil e Sessão

📁 views/recepcao/perfil.php
📁 views/auth/login.php (já deves ter)
📁 views/auth/logout.php (já deves ter)

Atualizar informações da recepcionista.

Gerenciar senha.

Controlar sessão/log out.

✅ Função: manter a conta segura e personalizada.

🧭 EXTRAS (para futuro) (opcional, mas muito útil)

📁 views/recepcao/relatorios.php – relatórios de atendimento, produtividade etc.
📁 views/recepcao/notificacoes.php – avisos automáticos de agendamento.
📁 views/recepcao/configuracoes.php – preferências gerais do sistema.