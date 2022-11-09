### INSTALAÇÃO

* CASO NÃO TENHA O **COMPOSER** E O **XAMPP** INSTALADOS, POR FAVOR BAIXAR E INSTALAR ANTES PARA EVITAR ERRO.

**DOWNLOAD COMPOSER LINK**: ` https://getcomposer.org/Composer-Setup.exe`

**DOWNLOAD DO XAMPP LINK**: `https://www.apachefriends.org/download.html`

### PRÓXIMOS PASSOS:

1. DEIXE O SERVIDOR RODANDO(ATIVO). EXECUTANDO O XAMPP QUE FICA EM `C:\xampp` DE **DUPLO CLIQUE** EM `xampp-control` QUE ESTA DENTRO DA PASTA. QUANDO ELE ABRIR VOCÊ CLICARA EM **START** REFERENTE A **APACHE** E A **MYSQL** FEITO IMAGEM ABAIXO:

![image](https://user-images.githubusercontent.com/97483102/199866517-360d261a-65d3-45ca-8afc-28b116002951.png)

2. EXTRAIR O ARQUIVO E RENOMEAR A PASTA PARA **topbeer** E COLAR ESSA PASTA NO **htdocs** QUE SE ENCONTRA DENTRO DA PASTA XAMPP: `C:\xampp\htdocs`

![image](https://user-images.githubusercontent.com/97483102/199866915-fd581fad-2470-4d86-a686-cd12700786bb.png)

3. ENTRE NA PASTA **topbeer** E DENTRO DELA FAÇA O SEGUINTE PROCEDIMENTO PARA ABRIR O POWER SHELL **SEGURAR SHIFT + BOTÃO DIREITO DO MOUSE**, E CLICAR EM **ABRIR JANELA DO POWER SHELL AQUI** FEITO A TELA ABAIXO:

![image](https://user-images.githubusercontent.com/97483102/199867233-f4eb3b95-0364-4da3-94fb-01b80076d5d0.png)

4. APÓS ABRIR A JANELA DO POWER SHELL É SO DIGITAR O COMANDO `composer install --no-dev` FEITO A IMAGEM ABAIXO:

![image](https://user-images.githubusercontent.com/97483102/199867610-2916070a-98f7-4387-9fcd-3434bfcb8ee2.png)

5. SE O COMPOSER ESTIVER INSTALADO CORRETAMENTE VAI ACONTECER ALGO SIMILAR A IMAGEM ABAIXO, AGUARDE A FINALIZAÇÃO.

![image](https://user-images.githubusercontent.com/97483102/199867723-e89576c6-d9e6-41e3-8ec3-3234ce3d1178.png)

6. AGORA É HORA DE CRIAR UM BANCO DE DADOS PELO **PHPMYADMIN**, PARA ISSO DIGITE A URL NO NAVEGADOR: `http://localhost/phpmyadmin/` E DENTRO DELE CRIE UM BD COM O NOME **topbeer**. CLICANDO NO BOTÃO **NOVO**  E DEPOIS DE DIGITAR O NOME DO SEU BD É SO CLICAR EM **CRIAR** FEITO IMAGEM ABAIXO.

![image](https://user-images.githubusercontent.com/97483102/199868017-4a60f7d0-c541-415f-91f9-fd74f1992804.png)

7. APÓS BD CRIADO ACESSAR LINK CLIQUE EM `IMPORTAR` E EM `ESCOLHER ARQUIVO`:

![image](https://user-images.githubusercontent.com/97483102/199868254-7ee7b2e2-d7ff-447e-a853-f31c7d80205e.png)

8. SELECIONE O ARQUIVO NA PASTA DO SISTEMA, CHAMADO `topbeer.sql` E **ABRIR**

![image](https://user-images.githubusercontent.com/97483102/199868647-88603ca7-9c58-412b-ae6b-1087d905e99f.png)

8. NO FINAL DA PÁGINA CLIQUE EM **IMPORTAR**
![image](https://user-images.githubusercontent.com/97483102/199868750-3ea9a840-41c2-45a4-9943-ba11c49c9b96.png)

### PARA RODAR O SISTEMA

1. Rode o comando `php -S localhost:8080` a partir da raiz do projeto.
2. Acesse a URL **http://localhost:8080/**.

## Credenciais usuário ADM:

`CPF: 012.345.678.90`
`Senha: 12345678`

## FUNCIONALIDADES FALTANTES

1. Ainda não foi implementado o relatório de compras do usuário.
2. As lojas parceiras ainda não está pontuando as compras dos usuários. 
Então quem faz o cadastro ganha 5000 BebumCoins, tem como o usuário administrador adicionar ou remover a quantidade desejada, no futuro com a API, vamos integrar os parceiros, simulando compras para o usuário receber BebumCoins.
                                                                 
### Grupo:
Eric Gustavo Denkievicz                               
Gabriel Jun Shibata                               
Gláucio Ferreira de Araújo   
