import Sequelize from 'sequelize';


const Link = Sequelize.define('link', {
    id: {
        type: Sequelize.INTEGER
    },
    url: {
        type: Sequelize.STRING
    },
    status: {
        type: Sequelize.BOOLEAN
    },
    user_id: {
        type: Sequelize.INTEGER 
    }

});

export default Link;