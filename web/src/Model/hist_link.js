// -- Model hist_link -- //
// -- Import -- //
import Sequelize from 'sequelize';
import Connection from '../Config/db';
import Usuarios from './Usuarios';
import Link from './link';
// -- Cria a estrutura da tabela -- //
const Hist_link = Connection.define('hist_link', {

    id: {
        type: Sequelize.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey:true
    },
    cod_http: {
        type: Sequelize.STRING
    },
    rest: {
        type: Sequelize.TEXT
    },
    user_id: {
        type: Sequelize.INTEGER,
        references: {
            model: Usuarios,
            key: 'id'
        }
    },
    link_id: {
        type: Sequelize.INTEGER,
        references: {
            model: Link,
            key: 'id'
        }
    }, 

}, {
    freezeTableName: true,
    createdAt: false,
    updatedAt: false
});

export default Hist_link;