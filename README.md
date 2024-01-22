# Processo seletivo - Desenvolvedor Full Stack PHP Pleno
Bem vindo, candidat@.

Estamos felizes que você esteja participando do processo seletivo para a vaga de Desenvolvedor Full Stack PHP Pleno do Senai - Soluções Digitais.

A prova deverá utilizar as seguintes tecnologias:

- Linguagem de programação PHP para o backend
- Banco de dados PostgreSQL ou MySql
- Testes unitários.
- GIT para versionamento da aplicação.
- Docker para deploy da aplicação.
- A utilização ou não de frameworks ficará a critério do candidato, tanto para back-end (Laravel/Symfony) como para front-end (Vue/React/Livewire).

Na etapa da entrevista deverá ser apresentado a aplicação em funcionamento.

- Instruções para a execução da prova será enviada por e-mail no horário definido em edital.
- Todo código desenvolvido deverá ser commitado neste repositório, não sendo aceito o envio da prova por outros meios.


### Será avaliado
- Facilidade no entendimento do código.
- Complexidade ciclomática do código.
- Divisão de responsabilidades das classes.
- Reutilização de código.
- Organização do projeto;
- Qualidade dos testes unitários implementados.
- Cobertura dos testes unitários.
- Desenvolvimento e funcionamento dos requisitos propostos.
- Utilização e configuração dos containers docker.
- Criatividade e inovação na solução proposta.
- Usabilidade do usuário.

### Informações extras
- Descreva ao final deste documento (Readme.md) o detalhamento de funcionalidades implementadas, sejam elas já descritas na modelagem e / ou extras.
- Detalhar também as funcionalidades que não conseguiu implementar e o motivo.
- Caso tenha adicionado novas libs ou frameworks, descreva quais foram e porque dessa agregação.

__(Escreva aqui as instruções para que possamos corrigir sua prova, bem como qualquer outra observação sobre a prova que achar pertinente compartilhar)__

## Detalhamento funcionalidades

- No módulo usuário consegui fazer toda a implementação com todas as regras tanto para adicionar, atualizar, lista e apagar usuário. Também consegui implementar a modal de exclusão onde outros módulos do sistema também a usam para excluir registros.

- No módulo de colaboradores consegui implementar todo o CRUD de todos os campos, os campos de "cargo" e "função" retornam seus objetos cadastrados no banco de dados, consegui implementar a geração automática do nome do usuário feita pelo backend, o campo no frontend é apenas de leitura. O ponto que não tive tempo de implementar foi a data de rescisão não ser anterior a data de admissão.

- Na funcionalidade de horários consegui implementar o cadastro das datas em uma tabela separada. Para facilitar criei um campo para cada data, assim não precisaria manipular essas datas nem no frontend nem no backend (por padrão não faria assim, mas por motivos de tempo achei que seria o mais adequado). Não tive tempo para implementar as validações de datas de entrada e saída de cada período do dia.

- No módulo feriados consegui implementar fazer a implementação completa da funciondalidade, a única exceção por motivos de tempo foi a regra de que o campo "data não deve aceitar datas já cadastradas" ao inserir um novo feriado.

- No módulo de registro de ponto consegui adicionar as data atual e horário, porém por motivos de segurança no momento do cadastro da data e hora o backend é quem gera tais dados. Ao clicar no botão de registro o sistema adiciona a data e a hora no banco de dados, e na visualização no frontend ele retorna apenas os registros feitos no dia atual, e de forma alternada ele coloca "entrada" ou "saída".

- Na funcionalidade do mapa utilizei uma biblioteca que busca a localização atual do usuário e adiciona latitude e longitude no banco de dados.


## Funcionalidades que não consegui implementar
- Validação na página de registro de ponto. Quando comecei não havia ficado claro que essa seria uma página onde apenas usuários logados teriam permissão, no final do desenvolvimento percebi isso. Porém adicionei um campo para buscar pela matrícula e posteriormente registrar a entrada ou saída.

## Libs e bibliotecas extras
- Adicionei no frontend a biblioteca Leaflet para renderização dos mapas.
- Adicionei no backend Pest para testes unitários e de feature, porém não consegui ter tempo de avançar.

