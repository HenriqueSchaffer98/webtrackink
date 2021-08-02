// -- Model usuarios -- //
// -- Import -- //
import Sequelize from 'sequelize';
import Connection from '../Config/db';

// -- Cria estrutura da tabela Usuarios -- //
const Usuarios = Connection.define('Usuarios', {
    

    id: {
        type: Sequelize.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey:true
    },
    nome: {
        type: Sequelize.STRING
    },
    username: {
        type: Sequelize.STRING
    },
    password: {
        type: Sequelize.STRING
    }

}, {
    freezeTableName: true,
    createdAt: false,
    updatedAt: false
});

export default Usuarios;