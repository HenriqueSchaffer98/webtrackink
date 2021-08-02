(async () => {
    import Sequelize from 'sequelize';
    import Connection from './Config/db';
    import Usuarios from './Model/Usuarios';
    import Link from './Model/link';
    import Hist_link from './Model/hist_link';
    import request from 'request';

    async function accessLinks() {
        try {
            const links = await Link.findAll();
            const buscaHist = await Hist_link.findAll();
            const link_id = await buscaHist.map((hist) => {
                return hist.link_id;
            });
             await links.map((item) => {
                console.log("Mapeando links..." + item.id + ": " + item.url);

                async function verLinks() {
                    console.log("Fazendo Requisições...");
                    request(item.url, (error, request, body) => {
                        console.log("Verificando existencia de registro..." + item.id);
                        async function verHistLink() {
                            const buscaRegistro = await Hist_link.findOne({
                                where: {
                                    link_id: item.id
                                }
                            });
                            if (!buscaRegistro) {
                                console.log("Registro não encontrado! Criando estrutura...");
                                Hist_link.create({
                                    cod_http: request.statusCode,
                                    rest: body,
                                    user_id: item.user_id,
                                    link_id: item.id
                                });
                                console.log("Estrutura criada!");
                            } else {
                                console.log("Registro encontrado! Atualizando informações..." + item.id + ": " + item.url);
                                Hist_link.update({
                                    cod_http: request.statusCode,
                                    rest: body
                                }, {
                                    where: {
                                        link_id: item.id
                                    }
                                });
/*                                 if(request.statusCode === "404"){
                                    Link.update({
                                        status: 0
                                    }, {
                                        where: {
                                            id: item.id
                                        }
                                    });
                                } */
    
                            }
                           
                        }
                        
                        verHistLink();

                    });
                }
                verLinks();

            }); 

        } catch (error) {
            console.log("Erro ao buscar dados do banco: " + error)
        }

    }
    setInterval(accessLinks, 180000);
})();