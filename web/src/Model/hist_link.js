import Sequelize from 'sequelize';

const hist_link = Sequelize.define('hist_link', {
    id: {
        type: Sequelize.INTEGER
    },
    cod_http: {
        type: Sequelize.STRING
    },
    rest: {
        type: Sequelize.TEXT
    },
    user_id: {
        type: Sequelize.INTEGER
    },
    link_id: {
        type: Sequelize.INTEGER
    }

});

export default hist_link;