# Sistema de Gerenciamento de Amostras Veterinárias

1. **Instruções de Execução**
- Baixar xampp 7.3.27 (foi relatado problema com outras versões quanto a manipulação de midias e pdf)
- Salvar a pasta xampp seguindo a recomendação de instalação
- Colocar este projeto na pasta htdocs do xampp
- Abrir o painel de controle do xampp e da start no mysql e no apache
- Abrir um navegador e digitar a url= http://localhost/phpmyadmin/
- Criar uma database de nome: db_lab
- Importar o sql do banco de dados de nome: db_lab (na pasta: database_phpmyadmin)
- Na tabela user o usuario de role 2 é aluno, 1 professor, 0 administrador geral
- As senhas estão criptografas, uma senha padrão que utilizamos no banco de dados: 698dc19d489c4e4db73e28a713eab07b  (esta senha na aplicação equivale a senha: teste)
- Digite no navegador http://localhost/nome_da_pasta_que_esta_no_htdocs_do_xampp
- A aplicação ira aparecer na tela de login
- Digite, email: admin@admin.com            senha:teste   -> para logar com um usuario do tipo administrador geral
- Digite, email: aluno@aluno.com            senha:teste   -> para logar com um usuario do tipo aluno
- Digite, email: professor@professor.com    senha:teste   -> para logar com um usuario do tipo professor



