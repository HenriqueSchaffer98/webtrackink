import Connection from '../Config/db'
import Sequelize from 'sequelize';
import Usuarios from './Usuarios';

const Link = Connection.define('link', {

    id: {
        type: Sequelize.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    url: {
        type: Sequelize.STRING
    },
    status: {
        type: Sequelize.BOOLEAN
    },
    user_id: {
        type: Sequelize.INTEGER,
        references: {
            model: Usuarios,
            key: 'id'
        }
    }

}, {
    freezeTableName: true,
    createdAt: false,
    updatedAt: false
});

export default Link;