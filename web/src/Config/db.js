// -- Configuração do acesso ao Banco -- // 
import Sequelize from 'sequelize';

const Connection = new Sequelize('webtrackink', 'root', '', {
  host: "localhost",
  dialect: 'mysql'
});

Connection
  .authenticate()
  .then(() => {
    console.log("Conectado com sucesso!")
  }).catch((error) => {
    console.log("Erro ao conectar com DB!", error)
  })

export default Connection;