




var request = require('request');
request('', function (error, response, body) {
  if (!error && response.statusCode == 200) {
    let response = body;

    console.log(response);
  }
});

// https://nodejs.org/api/http.html
/* import Sequelize from 'sequelize';

const sequelize = new Sequelize('webtrackink', 'root', '', {
    host: "localhost",
    dialect: 'mysql'
});
 */
/*
https://www.mundojs.com.br/2020/05/25/criando-um-web-scraper-com-nodejs/
https://desenvolvimentoparaweb.com/php/como-pegar-parte-do-conteudo-dados-de-outro-site-com-php/

*/

/* const Sequelize = require('sequelize'); // -- Importando sequelize
// -- Instanciando conexão com o banco de dados -- //
const sequelize = new Sequelize('webtrackink', 'root', '', {
    host: "localhost",
    dialect: 'mysql'
}); 


 */

// Busca requisição http
/* var request = require('request');
request('http://pt.stackoverflow.com', function (error, response, body) {
  if (!error && response.statusCode == 200) {
    console.log(response.statusCode) // Mostra o HTML da página inicial do StackOverflow.
  }
});



/* Teste de conexão
 sequelize.authenticate().then(() => {
    console.log("Conectado com Sucesso!");
}).catch((err)=>{
    console.log("Falha ao se conectar!" + err);
});
 */




/* const axios = require('axios');
const cheerio = require('cheerio');
const url = 'https://globoesporte.globo.com/rj/futebol/campeonato-carioca/';

axios(url).then(response => {
    const html = response.data;
    const $ = cheerio.load(html);
    const tabelaStatus = $('.ranking-item-wrapper');
    const tabelaJogador = [];

    tabelaStatus.each(function(){
        const nomeJogador = $(this).find('.jogador-nome').text();
        const posicaoJogador = $(this).find('.jogador-posicao').text();
        const numeroGols = $(this).find('.jogador-gols').text();
        const timeJogador = $(this).find('.jogador-escudo > img').attr('alt');
        tabelaJogador.push({
            nomeJogador,
            posicaoJogador,
            numeroGols,
            timeJogador
        });
    });
    console.log(tabelaJogador);
}).catch(console.error); */