API para importação de dados
Essa API tem como finalidade importar dados de documentos CSV e Excel.

Iniciando
Para utilizar a API, é necessário se cadastrar e utilizar o Token fornecido para realizar as requisições. O tipo de autenticação é Bearer Token.

Para se registrar acesse a rota: /api/register e forneça as seguintes informações:

name: Seu nome de Usuário email: Um email válido para o acesso password : Uma senha de sua confiança password_confirmation : Confirmação da senha

Com isso você receberá como resposta as informações do seu usuário e o seu token para acessar as rotas subsequentes.

Endpoints:
Os seguintes Endpoints estão disponíveis:

Login : /api/login Método: POST Caso já possua um usuário no sistema, pode fornecer suas informações para realizar o login. Campos: - name: string; - password: string;

Retorno: - user: - name: string; - email: string; - token

Logout: /api/logout Método: POST Utilize para sair do sistema e revogar seu token.

Importar: /api/import Método: POST Endpoint responsável pela importação do arquivo, utilize para o envio do documento. Documentos repetidos não serão aceitos. Campos: - file: file;

Histórico de Arquivos: /api/file-history Método: GET Lista os arquivos enviados para a API, use para saber se seu arquivo já foi enviado e quando. Parametros: - filter_file_name: Pesquisar por um arquivo pelo nome - String - filter_date: Pesquisar por um arquivo pela data - Date('y-m-d) Retorno: - filename: string; - id: integer; - created_at: datetime; - updated_at: datetime;

Dados: /api/data Método: GET Lista os dados importados dos arquivos enviados para a API. Parametros: - filter_tckr_symb: Pesquisa pelo respectivo campo - String - filter_rpt_dt: Pesquisa pelo respectivo campo - Date('y-m-d') Retorno: Todos os campos do arquivo
