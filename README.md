# Xtrier
Sistema de Triagem

Banco de Dados (MySQL)

Tabelas básicas:

users (id, nome, email, senha hash, tipo_usuario: paciente/recepcionista/doutor/admin).

pacientes (id, user_id, dados pessoais, histórico médico).

triagem (id, paciente_id, sintomas, prioridade, status).

consultas (id, paciente_id, doutor_id, data, observações, status).

notificacoes (id, user_id, mensagem, lida, data).

5. Funcionalidades por Painel

Paciente:

Cadastro/login.

Preenchimento da ficha de triagem.

Ver status da fila em tempo real.

Receber notificações (consulta confirmada, doutor disponível).

Recepcionista:

Validar cadastro do paciente.

Definir prioridade da triagem (baixa, média, alta).

Encaminhar paciente para doutor disponível.

Painel de fila em tempo real.

Doutor:

Lista de consultas atribuídas.

Acesso ao histórico do paciente.

Atualizar status da consulta.

Gerar relatórios simples.

Admin:

Gerenciar usuários (CRUD).

Estatísticas (quantidade de atendimentos por período).

Exportar relatórios (PDF, Excel).

6. Fluxo da Triagem

Paciente faz cadastro/login.

Preenche sintomas no formulário de triagem.

Sistema atribui prioridade inicial (ex: algoritmo de score simples).

Recepcionista revisa e ajusta se necessário.

Paciente entra na fila de espera.

Doutor chama paciente → atendimento → atualização de ficha.

Admin acompanha relatórios e estatísticas.