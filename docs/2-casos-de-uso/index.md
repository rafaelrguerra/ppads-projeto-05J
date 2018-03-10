# Casos de uso

## 1. Diagrama de casos de uso

<img src="CasodeUso.jpg" width="350"/>
  

**Instruções do professor**: Insira abaixo o diagrama com os casos de uso do seu sistema. A imagem abaixo é somente um exemplo.

## 2. Especificação dos casos de uso

### 2.1. Caso de uso **Buscar vaga**

| Campo          | Informação        |
|---|---|
| Identificador: | CU01              |
| Nome:          | Buscar vaga |
| Atores:        | Candidato |
| Sumário:       | Busca uma vaga dentro do nosso sistema. |

| Fluxo Principal |
|---|
| 1) O candidato entra no sistema e aparecem as vagas disponíveis. |
| 2) O candidato seleciona a vaga desejada. |
| 3) O candidato cadastra  seu currículo no sistema. |
| 4) O candidato faz o questionário. |

| Fluxo Alternativo (2a): vaga desejada indisponível. |
|---|
| 1) O candidato não encontra uma vaga desejada. |
| 2) O candidato deixa sua sugestão para inclusão da vaga em um campo específico. |

### 2.2. Caso de uso **Responder questinário**

| Campo          | Informação        |
|---|---|
| Identificador: | CU02              |
| Nome:          | Responder questinário |
| Atores:        | Candidato |
| Sumário:       | O candidato responde ao questionário oferecido. |

| Fluxo Principal |
|---|
| 1) O candidato após ter cadastrado seu currículo vai para a página do questionário. |
| 2) O candidato responde todas as questões do questionário. |
| 3) O candidato envia suas respostas para o sistema. |

| Fluxo Alternativo (3a): candidato não responde todas as questões. |
|---|
| 1) O sistema sinaliza o candidato que é necessário responder todas as questões. |
| 2) O sistema volta para o passo (2) no do fluxo principal. |

### 2.3. Caso de uso **CRUD Vaga**

| Campo          | Informação        |
|---|---|
| Identificador: | CU03              |
| Nome:          | CRUD vaga |
| Atores:        | Administrador |
| Sumário:       | Adiciona, atualiza ou remove uma vaga. |

| Fluxo Principal |
|---|
| 1) O administrador entra no sistema de vagas. |
| 2) O administrador clica para adicionar e inclui uma vaga desejada. |
| 3) O administrador clica para editar e atualiza uma vaga existente. |
| 4) O administrador clica para excluir uma vaga indisponível e deleta do sistema. |

| Fluxo Alternativo (3a): vaga já existente. |
|---|
| 1) O administrador tenta adicionar uma vaga já existente e o sistema recusa, voltando para a tela de vagas. |
| 2) O administrador tenta editar uma vaga porém atualiza para uma já existente, retornar na tela de vagas. |

### 2.4. Caso de uso **CRUD Questões**

| Campo          | Informação        |
|---|---|
| Identificador: | CU04              |
| Nome:          | CRUD questões |
| Atores:        | Administrador |
| Sumário:       | Adiciona, atualiza ou remove alguma questão do questionário. |

| Fluxo Principal |
|---|
| 1) O administrador entra no questionário. |
| 2) O administrador adiciona uma questão desejada. |
| 3) O administrador atualiza alguma questão existente. |
| 4) O administrador remove alguma questão na qual ache necessário deletar. |

| Fluxo Alternativo (4a): questão já existente. |
|---|
| 1) O administrador adiciona uma questão porém o sistema verifica uma questão igual. |
| 2) O sistema sinaliza o administrador sobre a divergência. |
| 3) O administrador conserta a questão. |

| Fluxo Alternativo (4b): questão com alternativas iguais. |
|---|
| 1) O administrador adiciona duas ou mais respostas iguais para a mesma questão. |
| 2) O sistema sinaliza o administrador sobre a divergência. |
| 3) O administrador conserta as respostas. |

### 2.7. Caso de uso **Avaliar Testes**

| Campo          | Informação        |
|---|---|
| Identificador: | CU07              |
| Nome:          | Avaliar testes |
| Atores:        | Avaliador |
| Sumário:       | Avalia os testes dos candidatos |

| Fluxo Principal |
|---|
| 1) O avaliador entra no menu **Testes dos candidatos**. |
| 2) O avaliador vê a correção das questões de múltipla escolha e avalia as dissertativas. |
| 3) O avaliador da um nota para o candidato. |

### 2.4. Caso de uso **CRUD Questões**

| Campo          | Informação        |
|---|---|
| Identificador: | CU04              |
| Nome:          | CRUD questões |
| Atores:        | Administrador |
| Sumário:       | Adiciona, atualiza ou remove alguma questão do questionário. |

| Fluxo Principal |
|---|
| 1) O administrador entra no questionário. |
| 2) O administrador adiciona uma questão desejada. |
| 3) O administrador atualiza alguma questão existente. |
| 4) O administrador remove alguma questão na qual ache necessário deletar. |

| Fluxo Alternativo (4a): questão já existente. |
|---|
| 1) O administrador adiciona uma questão porém o sistema verifica uma questão igual. |
| 2) O sistema sinaliza o administrador sobre a divergência. |
| 3) O administrador conserta a questão. |

| Fluxo Alternativo (4b): questão com alternativas iguais. |
|---|
| 1) O administrador adiciona duas ou mais respostas iguais para a mesma questão. |
| 2) O sistema sinaliza o administrador sobre a divergência. |
| 3) O administrador conserta as respostas. |

### 2.8. Caso de uso **Convidar Candidato**

| Campo          | Informação        |
|---|---|
| Identificador: | CU08              |
| Nome:          | Convidar candidato |
| Atores:        | Administrador |
| Sumário:       | Convida o candidato para o sistema |

| Fluxo Principal |
|---|
| 1) O administrador entra no menu **Convidar Candidato**. |
| 2) O sistema gera uma chave de login. |
| 3) O administrador insere o email do candidato. |
| 4) O administrador envia a chave para o email do candidato. |

| Fluxo Alternativo (4a): O email do usuário é inválido. |
|---|
| 1) O sistema mostra uma mensagem de email inválido. |
| 2) Volta para o passo (3) do fluxo principal. |
