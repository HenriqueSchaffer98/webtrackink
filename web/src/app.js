(async () => {
    // -- Import -- //
    import Sequelize from 'sequelize';
    import Connection from './Config/db';
    import Usuarios from './Model/Usuarios';
    import Link from './Model/link';
    import Hist_link from './Model/hist_link';
    import request from 'request';
    // -- Function Acessa Links -- //
    async function accessLinks() {
        try {
            // -- Busca informações -- //
            const links = await Link.findAll();
            const buscaHist = await Hist_link.findAll();
            const link_id = await buscaHist.map((hist) => {
                return hist.link_id;
            });
            // -- Mapeia as URLs -- //
            await links.map((item) => {
                console.log("Mapeando links..." + item.id + ": " + item.url);
                // -- Funtion Requisições -- //
                async function verLinks() {
                    console.log("Fazendo Requisições...");
                    request(item.url, (error, request, body) => {
                        console.log("Verificando existencia de registro..." + item.id);
                        // -- Busca Hist_link -- //
                        async function verHistLink() {
                            const buscaRegistro = await Hist_link.findOne({
                                where: {
                                    link_id: item.id
                                }
                            });
                            // -- Compara registros -- //
                            if (!buscaRegistro) {
                                console.log("Registro não encontrado! Criando estrutura...");
                                // -- Cria estrutura -- //
                                Hist_link.create({
                                    cod_http: request.statusCode,
                                    rest: body,
                                    user_id: item.user_id,
                                    link_id: item.id
                                });
                                console.log("Estrutura criada!");
                            } else {
                                console.log("Registro encontrado! Atualizando informações..." + item.id + ": " + item.url);
                                // -- Atualiza dados -- //
                                Hist_link.update({
                                    cod_http: request.statusCode,
                                    rest: body
                                }, {
                                    where: {
                                        link_id: item.id
                                    }
                                });
                                if (request.statusCode === 200) {
                                    Link.update({
                                        status: 1
                                    }, {
                                        where: {
                                            id: item.id
                                        }
                                    });
                                } else {
                                    Link.update({
                                        status: 0
                                    }, {
                                        where: {
                                            id: item.id
                                        }
                                    });
                                }

                            }

                        }
                        // -- Chama function -- //
                        verHistLink();

                    });
                }
                // -- Chama Function -- //
                verLinks();

            });

        } catch (error) {
            console.log("Erro ao buscar dados do banco: " + error)
        }

    }
    // -- Intervalo de execução -- //
    setInterval(accessLinks, 10000);
})();