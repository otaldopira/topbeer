/////////////////////////////////////////////////////////////////////////
//                                                                     //
// BeBumZao - O Programa de Fidelidade que vai te render muita alegria //
//                                                                     //
// Compre nas empresas parceiras, receba suas BeBumCoins e troque por  //
//  bebidas da Top Beer, a melhor distribuidora de bebidas do Paraná   //
//                                                                     //
//       Grupo: Eric Gustavo Denkievicz                                //
//              Gabriel Jun Shibata                                    //
//              Gláucio Ferreira de Araújo                             //
/////////////////////////////////////////////////////////////////////////

Antes da Instalação:
- Para a execução do sistema é necessário que você instale o ambiente de
  desenvolvimento XAMPP. O download pode ser realizado a partir do endereço:
  https://www.apachefriends.org/pt_br/index.html

Para Instalação do Sistema:
- Acesse o endereço: github.com/otaldopira/topbeer
- Na página exibida, clique no botão verde (Code), será exibida uma janela pop-up.
- Nesta janela, clique na opção "Download ZIP" localizada parte inferior.
- Será feito o download da pasta compactada com o sistema (no caso do Windows, 
  normalmente estará localizada na pasta Downloads).
- Extraia o conteúdo da pasta "topbeer-main" que se encontra na pasta compactada e
  copie na pasta "htdocs" do xampp (normalmente em C:\xampp\htdocs)
- Caso seja informado de que já existe algum arquivo com o mesmo nome, escolha 
  sobrescrever este arquivo (p.ex.: index.php)
- Verifique no painel de controle do Xampp se o serviço Apache foi iniciado, caso 
  não esteja, clique na opção "Start" na frente do módulo Apache.
- Agora já pode abrir o navegador e acessar "localhost" para abrir o sistema.

Requisitos Obrigatórios do Trabalho 1:
*PHP 8+; OK
*Documentação de configuração e instalação do software: este documento deve mostrar os 
 requisitos para instalação, quais arquivos de configuração devem ser atualizados; OK
*Uso de um padrão para estruturar o código: este padrão deve ser utilizado para separar 
 a lógica (validações, controle, etc.) e o HTML (apenas apresentação do conteúdo); OK
*Uso de formulários e envio de requisições do cliente para processamento no servidor, 
 com validações para prevenção de erros; OK
*Autenticação: deve ser criado um controle de login para acesso à áreas protegidas do app; OK
*Interface adequada: o aplicativo web deve prover uma interface adequada, com mensagens
 de feedback e erros (tratamento deve ser também no lado do servidor); OK
*Conter pelo menos 3 formulários de cadastro/edição diferentes e listas ou tabelas 
 para listagem de dados; OK

OBSERVAÇÕES: Como ainda não foi utilizado o acesso a Banco de Dados, não é possível fazer
a persistência dos dados. Foi utilizado o recurso de Matriz para simular alguns registros
necessários (p.ex: o Administrador do sistema), mas não é possível gravar registros ainda.
Foram gerados as interfaces para os cadastros (produtos, parceiros e usuários), mas não 
haverá a possibilidades de gravá-los ou editá-los pela falta de acesso ao Banco de Dados.