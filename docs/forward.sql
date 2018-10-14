/************ Update: Schemas ***************/

/* Add Schema: shadmin */
CREATE SCHEMA shadmin;

/* Add Schema: shcliente */
CREATE SCHEMA shcliente;


/************ Add: Sequences ***************/

CREATE SEQUENCE shadmin.sqidlogacessos INCREMENT BY 1;

CREATE SEQUENCE shadmin.sqidusuario INCREMENT BY 1;

CREATE SEQUENCE shcliente.sqidatualizacaoprocesso INCREMENT BY 1;

CREATE SEQUENCE shcliente.sqidcentrocusto INCREMENT BY 1;

CREATE SEQUENCE shcliente.sqidcliente INCREMENT BY 1;

CREATE SEQUENCE shcliente.sqidcompromisso INCREMENT BY 1;

CREATE SEQUENCE shcliente.sqidcontrato INCREMENT BY 1;

CREATE SEQUENCE shcliente.sqiddocumento INCREMENT BY 1;

CREATE SEQUENCE shcliente.sqidentrada INCREMENT BY 1;

CREATE SEQUENCE shcliente.sqidnotificacao INCREMENT BY 1;

CREATE SEQUENCE shcliente.sqidprocesso INCREMENT BY 1;

CREATE SEQUENCE shcliente.sqidsaida INCREMENT BY 1;

CREATE SEQUENCE shcliente.sqidtipocontrato INCREMENT BY 1;



/************ Update: Tables ***************/

/******************** Add Table: shadmin.logacessos ************************/

/* Build Table Structure */
CREATE TABLE shadmin.logacessos
(
	idlogacessos INTEGER NOT NULL,
	idusuario INTEGER NOT NULL,
	datahracesso TIMESTAMP NOT NULL
);

/* Add Primary Key */
ALTER TABLE shadmin.logacessos ADD CONSTRAINT pklogacessos
	PRIMARY KEY (idlogacessos);

/* Add Comments */
COMMENT ON COLUMN shadmin.logacessos.idusuario IS 'Id do Usuário';

COMMENT ON COLUMN shadmin.logacessos.datahracesso IS 'Data e Hora de Acesso';


/******************** Add Table: shadmin.usuario ************************/

/* Build Table Structure */
CREATE TABLE shadmin.usuario
(
	idusuario INTEGER NOT NULL,
	nome VARCHAR(250) NOT NULL,
	email VARCHAR(100) NOT NULL,
	senha VARCHAR(50) NOT NULL,
	cpf VARCHAR(11) NOT NULL,
	nvlacesso CHAR(1) NOT NULL,
	datacriacaousuario TIMESTAMP NULL,
	liberado CHAR(1) NULL
);

/* Add Primary Key */
ALTER TABLE shadmin.usuario ADD CONSTRAINT pkusuario
	PRIMARY KEY (idusuario);

/* Add Comments */
COMMENT ON COLUMN shadmin.usuario.nome IS 'Nome do Usuário';

COMMENT ON COLUMN shadmin.usuario.email IS 'E-mail do Usuário para acesso ao sistema';

COMMENT ON COLUMN shadmin.usuario.senha IS 'Senha do Usuário';

COMMENT ON COLUMN shadmin.usuario.cpf IS 'CPF do usuário';

COMMENT ON COLUMN shadmin.usuario.nvlacesso IS 'Nível de Acesso [A]Advogado [X]Auxiliar [C] Cliente';

COMMENT ON COLUMN shadmin.usuario.liberado IS '[1]Sim [0]Não';


/******************** Add Table: shcliente.atualizacaoprocesso ************************/

/* Build Table Structure */
CREATE TABLE shcliente.atualizacaoprocesso
(
	idatualizacaoprocesso INTEGER NOT NULL,
	idprocesso INTEGER NOT NULL,
	titulo VARCHAR(100) NOT NULL,
	descricao TEXT NULL,
	dataatualizacao TIMESTAMP NULL,
	nmarquivo VARCHAR(50) NULL
);

/* Add Primary Key */
ALTER TABLE shcliente.atualizacaoprocesso ADD CONSTRAINT pkatualizacaoprocesso
	PRIMARY KEY (idatualizacaoprocesso);

/* Add Comments */
COMMENT ON COLUMN shcliente.atualizacaoprocesso.idatualizacaoprocesso IS 'Id Atualização Processo';

COMMENT ON COLUMN shcliente.atualizacaoprocesso.idprocesso IS 'Id do Processo';

COMMENT ON COLUMN shcliente.atualizacaoprocesso.titulo IS 'Título da Atualização';

COMMENT ON COLUMN shcliente.atualizacaoprocesso.descricao IS 'Descrição da Atualização';

COMMENT ON COLUMN shcliente.atualizacaoprocesso.dataatualizacao IS 'Data da atualização';

COMMENT ON COLUMN shcliente.atualizacaoprocesso.nmarquivo IS 'Nome do arquivo físico';


/******************** Add Table: shcliente.centrocusto ************************/

/* Build Table Structure */
CREATE TABLE shcliente.centrocusto
(
	idcentrocusto INTEGER NOT NULL,
	nome VARCHAR(100) NOT NULL
);

/* Add Primary Key */
ALTER TABLE shcliente.centrocusto ADD CONSTRAINT pkcentrocusto
	PRIMARY KEY (idcentrocusto);

/* Add Comments */
COMMENT ON COLUMN shcliente.centrocusto.nome IS 'Nome do Centro de Custo';


/******************** Add Table: shcliente.cliente ************************/

/* Build Table Structure */
CREATE TABLE shcliente.cliente
(
	idcliente INTEGER NOT NULL,
	nome VARCHAR(250) NOT NULL,
	cpfcnpj VARCHAR(14) NOT NULL,
	tppessoa CHAR(1) NOT NULL,
	rua VARCHAR(200) NOT NULL,
	numero VARCHAR(10) NOT NULL,
	complemento VARCHAR(200) NULL,
	bairro VARCHAR(50) NOT NULL,
	cidade VARCHAR(50) NOT NULL,
	estado CHAR(2) NOT NULL,
	telefone VARCHAR(50) NOT NULL,
	celular VARCHAR(50) NULL
);

/* Add Primary Key */
ALTER TABLE shcliente.cliente ADD CONSTRAINT pkcliente
	PRIMARY KEY (idcliente);

/* Add Comments */
COMMENT ON COLUMN shcliente.cliente.idcliente IS 'Id do Cliente';

COMMENT ON COLUMN shcliente.cliente.cpfcnpj IS 'Cpf ou CNPJ do Cliente';

COMMENT ON COLUMN shcliente.cliente.tppessoa IS '[F]Física [J]Jurídica';

COMMENT ON COLUMN shcliente.cliente.rua IS 'Rua do Cliente';

COMMENT ON COLUMN shcliente.cliente.numero IS 'Número do Cliente';

COMMENT ON COLUMN shcliente.cliente.complemento IS 'Complemento';

COMMENT ON COLUMN shcliente.cliente.bairro IS 'Bairro do Cliente';

COMMENT ON COLUMN shcliente.cliente.cidade IS 'Cidade do Cliente';

COMMENT ON COLUMN shcliente.cliente.estado IS 'Estado de residência do Cliente';

COMMENT ON COLUMN shcliente.cliente.telefone IS 'Telefone Comercial';

COMMENT ON COLUMN shcliente.cliente.celular IS 'Celular do Cliente';


/******************** Add Table: shcliente.compromisso ************************/

/* Build Table Structure */
CREATE TABLE shcliente.compromisso
(
	idcompromisso INTEGER NOT NULL,
	titulo VARCHAR(100) NOT NULL,
	descricao TEXT NULL,
	datacompromisso DATE NULL,
	horariocompromisso TIME NOT NULL,
	local VARCHAR(250) NULL,
	idusuarioresponsavel INTEGER NOT NULL
);

/* Add Primary Key */
ALTER TABLE shcliente.compromisso ADD CONSTRAINT pkcompromisso
	PRIMARY KEY (idcompromisso);

/* Add Comments */
COMMENT ON COLUMN shcliente.compromisso.titulo IS 'Título do compromisso/evento';

COMMENT ON COLUMN shcliente.compromisso.descricao IS 'Descrição';

COMMENT ON COLUMN shcliente.compromisso.horariocompromisso IS 'Horário do Compromisso';

COMMENT ON COLUMN shcliente.compromisso.local IS 'Local do compromisso';

COMMENT ON COLUMN shcliente.compromisso.idusuarioresponsavel IS 'Usuário Responsável';


/******************** Add Table: shcliente.contrato ************************/

/* Build Table Structure */
CREATE TABLE shcliente.contrato
(
	idcontrato INTEGER NOT NULL,
	idcliente INTEGER NOT NULL,
	idtipocontrato INTEGER NOT NULL,
	titulo VARCHAR(200) NOT NULL,
	descricao TEXT NULL,
	nmarquivo VARCHAR(50) NOT NULL,
	datainiciovigencia DATE NOT NULL,
	datafimvigencia DATE NULL
);

/* Add Primary Key */
ALTER TABLE shcliente.contrato ADD CONSTRAINT pkcontrato
	PRIMARY KEY (idcontrato);

/* Add Comments */
COMMENT ON COLUMN shcliente.contrato.idcontrato IS 'Id do Contrato';

COMMENT ON COLUMN shcliente.contrato.idcliente IS 'Id do Cliente';

COMMENT ON COLUMN shcliente.contrato.idtipocontrato IS 'Tipo de Contrato';

COMMENT ON COLUMN shcliente.contrato.titulo IS 'Título do Contrato';

COMMENT ON COLUMN shcliente.contrato.descricao IS 'Descrição do Contrato';

COMMENT ON COLUMN shcliente.contrato.nmarquivo IS 'Nome do arquivo físico';

COMMENT ON COLUMN shcliente.contrato.datainiciovigencia IS 'Data de Início de Vigência do Contrato';

COMMENT ON COLUMN shcliente.contrato.datafimvigencia IS 'Data de Fim de Vigência do Contrato';


/******************** Add Table: shcliente.documento ************************/

/* Build Table Structure */
CREATE TABLE shcliente.documento
(
	iddocumento INTEGER NOT NULL,
	nome VARCHAR(150) NOT NULL,
	idusuariocriador INTEGER NOT NULL,
	datacadastro DATE NOT NULL,
	nomearquivo VARCHAR(50) NOT NULL
);

/* Add Primary Key */
ALTER TABLE shcliente.documento ADD CONSTRAINT pkdocumento
	PRIMARY KEY (iddocumento);

/* Add Comments */
COMMENT ON COLUMN shcliente.documento.nome IS 'Nome do Documento';

COMMENT ON COLUMN shcliente.documento.idusuariocriador IS 'Id do Usuário que criou o documento';

COMMENT ON COLUMN shcliente.documento.datacadastro IS 'Data de Cadastro';

COMMENT ON COLUMN shcliente.documento.nomearquivo IS 'Nome do Arquivo Físico';


/******************** Add Table: shcliente.entrada ************************/

/* Build Table Structure */
CREATE TABLE shcliente.entrada
(
	identrada INTEGER NOT NULL,
	idcentrocusto INTEGER NOT NULL,
	idcliente INTEGER NULL,
	flstatus CHAR(1) NOT NULL,
	descricao VARCHAR(200) NOT NULL,
	valor DECIMAL(10, 2) NOT NULL,
	datavencimento DATE NULL,
	datapagamento DATE NOT NULL
);

/* Add Primary Key */
ALTER TABLE shcliente.entrada ADD CONSTRAINT pkentrada
	PRIMARY KEY (identrada);

/* Add Comments */
COMMENT ON COLUMN shcliente.entrada.idcentrocusto IS 'Centro de Custo';

COMMENT ON COLUMN shcliente.entrada.idcliente IS 'Id do Cliente (se estiver relacionado a um cliente)';

COMMENT ON COLUMN shcliente.entrada.flstatus IS 'Indica se a entrada foi efetuada ou ainda será [S]Sim [N]Não';

COMMENT ON COLUMN shcliente.entrada.descricao IS 'Descrição da Entrada';

COMMENT ON COLUMN shcliente.entrada.valor IS 'Valor';

COMMENT ON COLUMN shcliente.entrada.datavencimento IS 'Data de Vencimento';

COMMENT ON COLUMN shcliente.entrada.datapagamento IS 'Data do Recebimento';


/******************** Add Table: shcliente.notificacao ************************/

/* Build Table Structure */
CREATE TABLE shcliente.notificacao
(
	idnotificacao INTEGER NOT NULL,
	titulo VARCHAR(50) NULL,
	dataenvio TIMESTAMP NOT NULL,
	flstatus CHAR(1) NOT NULL,
	idusuariodestino INTEGER NOT NULL
);

/* Add Primary Key */
ALTER TABLE shcliente.notificacao ADD CONSTRAINT pknotificacao
	PRIMARY KEY (idnotificacao);

/* Add Comments */
COMMENT ON COLUMN shcliente.notificacao.titulo IS 'Título da Notificação';

COMMENT ON COLUMN shcliente.notificacao.dataenvio IS 'Data de Envio da Notificação';

COMMENT ON COLUMN shcliente.notificacao.flstatus IS '[V]Visualizada [N]Não Visualizada';

COMMENT ON COLUMN shcliente.notificacao.idusuariodestino IS 'Id do Usuário Destino';


/******************** Add Table: shcliente.processo ************************/

/* Build Table Structure */
CREATE TABLE shcliente.processo
(
	idprocesso INTEGER NOT NULL,
	idcliente INTEGER NOT NULL,
	titulo VARCHAR(250) NOT NULL,
	numero INTEGER NULL,
	descricao TEXT NULL,
	dataabertura DATE NULL,
	valorhonorario DECIMAL(10, 2) NOT NULL,
	valorinicial DECIMAL(10, 2) NULL,
	idusuarioresponsavel INTEGER NOT NULL,
	idusuariocriador INTEGER NOT NULL,
	idcontrato INTEGER NULL
);

/* Add Primary Key */
ALTER TABLE shcliente.processo ADD CONSTRAINT pkprocesso
	PRIMARY KEY (idprocesso);

/* Add Comments */
COMMENT ON COLUMN shcliente.processo.idprocesso IS 'Id do Processo';

COMMENT ON COLUMN shcliente.processo.idcliente IS 'Id do Cliente a quem pertence o processo';

COMMENT ON COLUMN shcliente.processo.titulo IS 'Título atribuído ao Processo';

COMMENT ON COLUMN shcliente.processo.numero IS 'Número do Processo';

COMMENT ON COLUMN shcliente.processo.descricao IS 'Descrição do Processo';

COMMENT ON COLUMN shcliente.processo.dataabertura IS 'Data de Criação do Processo no Escritório';

COMMENT ON COLUMN shcliente.processo.valorhonorario IS 'Valor dos Honorários';

COMMENT ON COLUMN shcliente.processo.valorinicial IS 'Valor Inicial do Processo';

COMMENT ON COLUMN shcliente.processo.idusuarioresponsavel IS 'Id do Usuário Responsável';

COMMENT ON COLUMN shcliente.processo.idusuariocriador IS 'Id do Usuário que criou o processo';

COMMENT ON COLUMN shcliente.processo.idcontrato IS 'Id do Contrato';


/******************** Add Table: shcliente.saida ************************/

/* Build Table Structure */
CREATE TABLE shcliente.saida
(
	idsaida INTEGER NOT NULL,
	idcentrocusto INTEGER NOT NULL,
	flstatus CHAR(1) NOT NULL,
	descricao VARCHAR(250) NOT NULL,
	valor DECIMAL(10, 2) NOT NULL,
	datavencimento DATE NULL,
	datapagamento DATE NULL
);

/* Add Primary Key */
ALTER TABLE shcliente.saida ADD CONSTRAINT pksaida
	PRIMARY KEY (idsaida);

/* Add Comments */
COMMENT ON COLUMN shcliente.saida.idcentrocusto IS 'Centro de Custo';

COMMENT ON COLUMN shcliente.saida.flstatus IS 'Sinaliza se a conta foi paga ou não
[S]Sim [N]Não';

COMMENT ON COLUMN shcliente.saida.descricao IS 'Descrição';

COMMENT ON COLUMN shcliente.saida.valor IS 'Valor';

COMMENT ON COLUMN shcliente.saida.datavencimento IS 'Data de Vencimento';

COMMENT ON COLUMN shcliente.saida.datapagamento IS 'Data em que a conta foi paga';


/******************** Add Table: shcliente.tipocontrato ************************/

/* Build Table Structure */
CREATE TABLE shcliente.tipocontrato
(
	idtipocontrato INTEGER NOT NULL,
	nome VARCHAR(200) NOT NULL
);

/* Add Primary Key */
ALTER TABLE shcliente.tipocontrato ADD CONSTRAINT pktipocontrato
	PRIMARY KEY (idtipocontrato);

/* Add Comments */
COMMENT ON COLUMN shcliente.tipocontrato.idtipocontrato IS 'Id do Tipo de Contrato';

COMMENT ON COLUMN shcliente.tipocontrato.nome IS 'Nome do Tipo de Contrato';



/* Remove Schemas */

DROP SCHEMA public CASCADE;




/************ Add Foreign Keys ***************/

/* Add Foreign Key: fk_logacessos_usuario */
ALTER TABLE shadmin.logacessos ADD CONSTRAINT fk_logacessos_usuario
	FOREIGN KEY (idusuario) REFERENCES shadmin.usuario (idusuario)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_atualizacaoprocesso_processo */
ALTER TABLE shcliente.atualizacaoprocesso ADD CONSTRAINT fk_atualizacaoprocesso_processo
	FOREIGN KEY (idprocesso) REFERENCES shcliente.processo (idprocesso)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_compromisso_usuario */
ALTER TABLE shcliente.compromisso ADD CONSTRAINT fk_compromisso_usuario
	FOREIGN KEY (idusuarioresponsavel) REFERENCES shadmin.usuario (idusuario)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_contrato_cliente */
ALTER TABLE shcliente.contrato ADD CONSTRAINT fk_contrato_cliente
	FOREIGN KEY (idcliente) REFERENCES shcliente.cliente (idcliente)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_contrato_tipocontrato */
ALTER TABLE shcliente.contrato ADD CONSTRAINT fk_contrato_tipocontrato
	FOREIGN KEY (idtipocontrato) REFERENCES shcliente.tipocontrato (idtipocontrato)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_documento_usuario */
ALTER TABLE shcliente.documento ADD CONSTRAINT fk_documento_usuario
	FOREIGN KEY (idusuariocriador) REFERENCES shadmin.usuario (idusuario)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_entrada_cliente */
ALTER TABLE shcliente.entrada ADD CONSTRAINT fk_entrada_cliente
	FOREIGN KEY (idcliente) REFERENCES shcliente.cliente (idcliente)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_transferencia_centrocusto */
ALTER TABLE shcliente.entrada ADD CONSTRAINT fk_transferencia_centrocusto
	FOREIGN KEY (idcentrocusto) REFERENCES shcliente.centrocusto (idcentrocusto)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_notificacao_usuario */
ALTER TABLE shcliente.notificacao ADD CONSTRAINT fk_notificacao_usuario
	FOREIGN KEY (idusuariodestino) REFERENCES shadmin.usuario (idusuario)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_processo_contrato */
ALTER TABLE shcliente.processo ADD CONSTRAINT fk_processo_contrato
	FOREIGN KEY (idcontrato) REFERENCES shcliente.contrato (idcontrato)
	ON UPDATE NO ACTION ON DELETE NO ACTION;

/* Add Foreign Key: fk_saida_centrocusto */
ALTER TABLE shcliente.saida ADD CONSTRAINT fk_saida_centrocusto
	FOREIGN KEY (idcentrocusto) REFERENCES shcliente.centrocusto (idcentrocusto)
	ON UPDATE NO ACTION ON DELETE NO ACTION;