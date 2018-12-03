--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.8
-- Dumped by pg_dump version 9.6.0

-- Started on 2018-12-03 20:37:53

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 7 (class 2615 OID 16715)
-- Name: shadmin; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA shadmin;


ALTER SCHEMA shadmin OWNER TO postgres;

--
-- TOC entry 8 (class 2615 OID 16716)
-- Name: shcliente; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA shcliente;


ALTER SCHEMA shcliente OWNER TO postgres;

--
-- TOC entry 1 (class 3079 OID 16717)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2265 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = shadmin, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 187 (class 1259 OID 16722)
-- Name: logacessos; Type: TABLE; Schema: shadmin; Owner: postgres
--

CREATE TABLE logacessos (
    idlogacessos integer NOT NULL,
    idusuario integer NOT NULL,
    datahracesso timestamp without time zone NOT NULL,
    ipusuario character varying(20)
);


ALTER TABLE logacessos OWNER TO postgres;

--
-- TOC entry 2266 (class 0 OID 0)
-- Dependencies: 187
-- Name: COLUMN logacessos.idusuario; Type: COMMENT; Schema: shadmin; Owner: postgres
--

COMMENT ON COLUMN logacessos.idusuario IS 'Id do Usuário';


--
-- TOC entry 2267 (class 0 OID 0)
-- Dependencies: 187
-- Name: COLUMN logacessos.datahracesso; Type: COMMENT; Schema: shadmin; Owner: postgres
--

COMMENT ON COLUMN logacessos.datahracesso IS 'Data e Hora de Acesso';


--
-- TOC entry 188 (class 1259 OID 16725)
-- Name: sqidlogacessos; Type: SEQUENCE; Schema: shadmin; Owner: postgres
--

CREATE SEQUENCE sqidlogacessos
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sqidlogacessos OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 16727)
-- Name: sqidusuario; Type: SEQUENCE; Schema: shadmin; Owner: postgres
--

CREATE SEQUENCE sqidusuario
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sqidusuario OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 16729)
-- Name: usuario; Type: TABLE; Schema: shadmin; Owner: postgres
--

CREATE TABLE usuario (
    idusuario integer NOT NULL,
    nome character varying(250) NOT NULL,
    email character varying(100) NOT NULL,
    senha character varying(50) NOT NULL,
    cpf character varying(14) NOT NULL,
    nvlacesso character(1) NOT NULL,
    datacriacaousuario timestamp without time zone,
    liberado character(1)
);


ALTER TABLE usuario OWNER TO postgres;

--
-- TOC entry 2268 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN usuario.nome; Type: COMMENT; Schema: shadmin; Owner: postgres
--

COMMENT ON COLUMN usuario.nome IS 'Nome do Usuário';


--
-- TOC entry 2269 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN usuario.email; Type: COMMENT; Schema: shadmin; Owner: postgres
--

COMMENT ON COLUMN usuario.email IS 'E-mail do Usuário para acesso ao sistema';


--
-- TOC entry 2270 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN usuario.senha; Type: COMMENT; Schema: shadmin; Owner: postgres
--

COMMENT ON COLUMN usuario.senha IS 'Senha do Usuário';


--
-- TOC entry 2271 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN usuario.cpf; Type: COMMENT; Schema: shadmin; Owner: postgres
--

COMMENT ON COLUMN usuario.cpf IS 'CPF do usuário';


--
-- TOC entry 2272 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN usuario.nvlacesso; Type: COMMENT; Schema: shadmin; Owner: postgres
--

COMMENT ON COLUMN usuario.nvlacesso IS 'Nível de Acesso [A]Advogado [X]Auxiliar [C] Cliente';


--
-- TOC entry 2273 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN usuario.liberado; Type: COMMENT; Schema: shadmin; Owner: postgres
--

COMMENT ON COLUMN usuario.liberado IS '[1]Sim [0]Não';


SET search_path = shcliente, pg_catalog;

--
-- TOC entry 191 (class 1259 OID 16732)
-- Name: atualizacaoprocesso; Type: TABLE; Schema: shcliente; Owner: postgres
--

CREATE TABLE atualizacaoprocesso (
    idatualizacaoprocesso integer NOT NULL,
    idprocesso integer NOT NULL,
    titulo character varying(100) NOT NULL,
    descricao text,
    dataatualizacao timestamp without time zone,
    nmarquivo character varying(50),
    extarquivo character varying(10)
);


ALTER TABLE atualizacaoprocesso OWNER TO postgres;

--
-- TOC entry 2274 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN atualizacaoprocesso.idatualizacaoprocesso; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN atualizacaoprocesso.idatualizacaoprocesso IS 'Id Atualização Processo';


--
-- TOC entry 2275 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN atualizacaoprocesso.idprocesso; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN atualizacaoprocesso.idprocesso IS 'Id do Processo';


--
-- TOC entry 2276 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN atualizacaoprocesso.titulo; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN atualizacaoprocesso.titulo IS 'Título da Atualização';


--
-- TOC entry 2277 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN atualizacaoprocesso.descricao; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN atualizacaoprocesso.descricao IS 'Descrição da Atualização';


--
-- TOC entry 2278 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN atualizacaoprocesso.dataatualizacao; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN atualizacaoprocesso.dataatualizacao IS 'Data da atualização';


--
-- TOC entry 2279 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN atualizacaoprocesso.nmarquivo; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN atualizacaoprocesso.nmarquivo IS 'Nome do arquivo físico';


--
-- TOC entry 192 (class 1259 OID 16738)
-- Name: centrocusto; Type: TABLE; Schema: shcliente; Owner: postgres
--

CREATE TABLE centrocusto (
    idcentrocusto integer NOT NULL,
    nome character varying(100) NOT NULL
);


ALTER TABLE centrocusto OWNER TO postgres;

--
-- TOC entry 2280 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN centrocusto.nome; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN centrocusto.nome IS 'Nome do Centro de Custo';


--
-- TOC entry 193 (class 1259 OID 16741)
-- Name: cliente; Type: TABLE; Schema: shcliente; Owner: postgres
--

CREATE TABLE cliente (
    idcliente integer NOT NULL,
    nome character varying(250) NOT NULL,
    cpfcnpj character varying(20) NOT NULL,
    tppessoa character(1) NOT NULL,
    rua character varying(200) NOT NULL,
    numero character varying(10) NOT NULL,
    complemento character varying(200),
    bairro character varying(50) NOT NULL,
    cidade character varying(50) NOT NULL,
    estado character(2) NOT NULL,
    telefone character varying(50),
    celular character varying(50) NOT NULL,
    datanascimento date NOT NULL,
    profissao character varying(200),
    email character varying(100),
    cep character varying(20) NOT NULL
);


ALTER TABLE cliente OWNER TO postgres;

--
-- TOC entry 2281 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.idcliente; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.idcliente IS 'Id do Cliente';


--
-- TOC entry 2282 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.cpfcnpj; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.cpfcnpj IS 'Cpf ou CNPJ do Cliente';


--
-- TOC entry 2283 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.tppessoa; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.tppessoa IS '[F]Física [J]Jurídica';


--
-- TOC entry 2284 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.rua; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.rua IS 'Rua do Cliente';


--
-- TOC entry 2285 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.numero; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.numero IS 'Número do Cliente';


--
-- TOC entry 2286 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.complemento; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.complemento IS 'Complemento';


--
-- TOC entry 2287 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.bairro; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.bairro IS 'Bairro do Cliente';


--
-- TOC entry 2288 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.cidade; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.cidade IS 'Cidade do Cliente';


--
-- TOC entry 2289 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.estado; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.estado IS 'Estado de residência do Cliente';


--
-- TOC entry 2290 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.telefone; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.telefone IS 'Telefone Comercial';


--
-- TOC entry 2291 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.celular; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.celular IS 'Celular do Cliente';


--
-- TOC entry 2292 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.datanascimento; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.datanascimento IS 'Data de Nascimento';


--
-- TOC entry 2293 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.profissao; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.profissao IS 'Profissão';


--
-- TOC entry 2294 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.email; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.email IS 'E-mail do cliente';


--
-- TOC entry 2295 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cliente.cep; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN cliente.cep IS 'CEP';


--
-- TOC entry 194 (class 1259 OID 16747)
-- Name: compromisso; Type: TABLE; Schema: shcliente; Owner: postgres
--

CREATE TABLE compromisso (
    idcompromisso integer NOT NULL,
    titulo character varying(100) NOT NULL,
    descricao text,
    datacompromisso date,
    horariocompromisso time without time zone NOT NULL,
    local character varying(250),
    idusuarioresponsavel character varying(10) NOT NULL
);


ALTER TABLE compromisso OWNER TO postgres;

--
-- TOC entry 2296 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN compromisso.titulo; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN compromisso.titulo IS 'Título do compromisso/evento';


--
-- TOC entry 2297 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN compromisso.descricao; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN compromisso.descricao IS 'Descrição';


--
-- TOC entry 2298 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN compromisso.horariocompromisso; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN compromisso.horariocompromisso IS 'Horário do Compromisso';


--
-- TOC entry 2299 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN compromisso.local; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN compromisso.local IS 'Local do compromisso';


--
-- TOC entry 2300 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN compromisso.idusuarioresponsavel; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN compromisso.idusuarioresponsavel IS 'Usuário Responsável';


--
-- TOC entry 195 (class 1259 OID 16753)
-- Name: contrato; Type: TABLE; Schema: shcliente; Owner: postgres
--

CREATE TABLE contrato (
    idcontrato integer NOT NULL,
    idcliente integer NOT NULL,
    idtipocontrato integer NOT NULL,
    titulo character varying(200) NOT NULL,
    descricao text,
    nmarquivo character varying(100),
    datainiciovigencia date NOT NULL,
    datafimvigencia date,
    extarquivo character varying(10)
);


ALTER TABLE contrato OWNER TO postgres;

--
-- TOC entry 2301 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN contrato.idcontrato; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN contrato.idcontrato IS 'Id do Contrato';


--
-- TOC entry 2302 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN contrato.idcliente; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN contrato.idcliente IS 'Id do Cliente';


--
-- TOC entry 2303 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN contrato.idtipocontrato; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN contrato.idtipocontrato IS 'Tipo de Contrato';


--
-- TOC entry 2304 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN contrato.titulo; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN contrato.titulo IS 'Título do Contrato';


--
-- TOC entry 2305 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN contrato.descricao; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN contrato.descricao IS 'Descrição do Contrato';


--
-- TOC entry 2306 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN contrato.nmarquivo; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN contrato.nmarquivo IS 'Nome do arquivo físico';


--
-- TOC entry 2307 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN contrato.datainiciovigencia; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN contrato.datainiciovigencia IS 'Data de Início de Vigência do Contrato';


--
-- TOC entry 2308 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN contrato.datafimvigencia; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN contrato.datafimvigencia IS 'Data de Fim de Vigência do Contrato';


--
-- TOC entry 196 (class 1259 OID 16759)
-- Name: documento; Type: TABLE; Schema: shcliente; Owner: postgres
--

CREATE TABLE documento (
    iddocumento integer NOT NULL,
    nome character varying(150) NOT NULL,
    idusuariocriador integer NOT NULL,
    datacadastro date NOT NULL,
    nmarquivo character varying(50) NOT NULL,
    extarquivo character varying(10) NOT NULL
);


ALTER TABLE documento OWNER TO postgres;

--
-- TOC entry 2309 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN documento.nome; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN documento.nome IS 'Nome do Documento';


--
-- TOC entry 2310 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN documento.idusuariocriador; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN documento.idusuariocriador IS 'Id do Usuário que criou o documento';


--
-- TOC entry 2311 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN documento.datacadastro; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN documento.datacadastro IS 'Data de Cadastro';


--
-- TOC entry 2312 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN documento.nmarquivo; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN documento.nmarquivo IS 'Nome do Arquivo Físico';


--
-- TOC entry 197 (class 1259 OID 16762)
-- Name: entrada; Type: TABLE; Schema: shcliente; Owner: postgres
--

CREATE TABLE entrada (
    identrada integer NOT NULL,
    idcentrocusto integer NOT NULL,
    idcliente integer,
    descricao character varying(200) NOT NULL,
    valor numeric(10,2) NOT NULL,
    datavencimento date,
    datapagamento date
);


ALTER TABLE entrada OWNER TO postgres;

--
-- TOC entry 2313 (class 0 OID 0)
-- Dependencies: 197
-- Name: COLUMN entrada.idcentrocusto; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN entrada.idcentrocusto IS 'Centro de Custo';


--
-- TOC entry 2314 (class 0 OID 0)
-- Dependencies: 197
-- Name: COLUMN entrada.idcliente; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN entrada.idcliente IS 'Id do Cliente (se estiver relacionado a um cliente)';


--
-- TOC entry 2315 (class 0 OID 0)
-- Dependencies: 197
-- Name: COLUMN entrada.descricao; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN entrada.descricao IS 'Descrição da Entrada';


--
-- TOC entry 2316 (class 0 OID 0)
-- Dependencies: 197
-- Name: COLUMN entrada.valor; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN entrada.valor IS 'Valor';


--
-- TOC entry 2317 (class 0 OID 0)
-- Dependencies: 197
-- Name: COLUMN entrada.datavencimento; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN entrada.datavencimento IS 'Data de Vencimento';


--
-- TOC entry 2318 (class 0 OID 0)
-- Dependencies: 197
-- Name: COLUMN entrada.datapagamento; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN entrada.datapagamento IS 'Data do Recebimento';


--
-- TOC entry 198 (class 1259 OID 16765)
-- Name: notificacao; Type: TABLE; Schema: shcliente; Owner: postgres
--

CREATE TABLE notificacao (
    idnotificacao integer NOT NULL,
    titulo character varying(250),
    dataenvio timestamp without time zone NOT NULL,
    flstatus character(1),
    idusuariodestino integer NOT NULL
);


ALTER TABLE notificacao OWNER TO postgres;

--
-- TOC entry 2319 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN notificacao.titulo; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN notificacao.titulo IS 'Título da Notificação';


--
-- TOC entry 2320 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN notificacao.dataenvio; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN notificacao.dataenvio IS 'Data de Envio da Notificação';


--
-- TOC entry 2321 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN notificacao.flstatus; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN notificacao.flstatus IS '[V]Visualizada [N]Não Visualizada';


--
-- TOC entry 2322 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN notificacao.idusuariodestino; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN notificacao.idusuariodestino IS 'Id do Usuário Destino';


--
-- TOC entry 199 (class 1259 OID 16768)
-- Name: processo; Type: TABLE; Schema: shcliente; Owner: postgres
--

CREATE TABLE processo (
    idprocesso integer NOT NULL,
    idcliente integer NOT NULL,
    titulo character varying(250) NOT NULL,
    numero integer,
    descricao text,
    dataabertura date,
    valorhonorario numeric(10,2) NOT NULL,
    idusuariocriador integer NOT NULL,
    idcontrato integer
);


ALTER TABLE processo OWNER TO postgres;

--
-- TOC entry 2323 (class 0 OID 0)
-- Dependencies: 199
-- Name: COLUMN processo.idprocesso; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN processo.idprocesso IS 'Id do Processo';


--
-- TOC entry 2324 (class 0 OID 0)
-- Dependencies: 199
-- Name: COLUMN processo.idcliente; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN processo.idcliente IS 'Id do Cliente a quem pertence o processo';


--
-- TOC entry 2325 (class 0 OID 0)
-- Dependencies: 199
-- Name: COLUMN processo.titulo; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN processo.titulo IS 'Título atribuído ao Processo';


--
-- TOC entry 2326 (class 0 OID 0)
-- Dependencies: 199
-- Name: COLUMN processo.numero; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN processo.numero IS 'Número do Processo';


--
-- TOC entry 2327 (class 0 OID 0)
-- Dependencies: 199
-- Name: COLUMN processo.descricao; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN processo.descricao IS 'Descrição do Processo';


--
-- TOC entry 2328 (class 0 OID 0)
-- Dependencies: 199
-- Name: COLUMN processo.dataabertura; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN processo.dataabertura IS 'Data de Criação do Processo no Escritório';


--
-- TOC entry 2329 (class 0 OID 0)
-- Dependencies: 199
-- Name: COLUMN processo.valorhonorario; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN processo.valorhonorario IS 'Valor dos Honorários';


--
-- TOC entry 2330 (class 0 OID 0)
-- Dependencies: 199
-- Name: COLUMN processo.idusuariocriador; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN processo.idusuariocriador IS 'Id do Usuário que criou o processo';


--
-- TOC entry 2331 (class 0 OID 0)
-- Dependencies: 199
-- Name: COLUMN processo.idcontrato; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN processo.idcontrato IS 'Id do Contrato';


--
-- TOC entry 200 (class 1259 OID 16774)
-- Name: saida; Type: TABLE; Schema: shcliente; Owner: postgres
--

CREATE TABLE saida (
    idsaida integer NOT NULL,
    idcentrocusto integer NOT NULL,
    descricao character varying(250) NOT NULL,
    valor numeric(10,2) NOT NULL,
    datavencimento date,
    datapagamento date
);


ALTER TABLE saida OWNER TO postgres;

--
-- TOC entry 2332 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN saida.idcentrocusto; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN saida.idcentrocusto IS 'Centro de Custo';


--
-- TOC entry 2333 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN saida.descricao; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN saida.descricao IS 'Descrição';


--
-- TOC entry 2334 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN saida.valor; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN saida.valor IS 'Valor';


--
-- TOC entry 2335 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN saida.datavencimento; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN saida.datavencimento IS 'Data de Vencimento';


--
-- TOC entry 2336 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN saida.datapagamento; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN saida.datapagamento IS 'Data em que a conta foi paga';


--
-- TOC entry 201 (class 1259 OID 16777)
-- Name: sqidatualizacaoprocesso; Type: SEQUENCE; Schema: shcliente; Owner: postgres
--

CREATE SEQUENCE sqidatualizacaoprocesso
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sqidatualizacaoprocesso OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16779)
-- Name: sqidcentrocusto; Type: SEQUENCE; Schema: shcliente; Owner: postgres
--

CREATE SEQUENCE sqidcentrocusto
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sqidcentrocusto OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16781)
-- Name: sqidcliente; Type: SEQUENCE; Schema: shcliente; Owner: postgres
--

CREATE SEQUENCE sqidcliente
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sqidcliente OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16783)
-- Name: sqidcompromisso; Type: SEQUENCE; Schema: shcliente; Owner: postgres
--

CREATE SEQUENCE sqidcompromisso
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sqidcompromisso OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16785)
-- Name: sqidcontrato; Type: SEQUENCE; Schema: shcliente; Owner: postgres
--

CREATE SEQUENCE sqidcontrato
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sqidcontrato OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16787)
-- Name: sqiddocumento; Type: SEQUENCE; Schema: shcliente; Owner: postgres
--

CREATE SEQUENCE sqiddocumento
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sqiddocumento OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16789)
-- Name: sqidentrada; Type: SEQUENCE; Schema: shcliente; Owner: postgres
--

CREATE SEQUENCE sqidentrada
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sqidentrada OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 16791)
-- Name: sqidnotificacao; Type: SEQUENCE; Schema: shcliente; Owner: postgres
--

CREATE SEQUENCE sqidnotificacao
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sqidnotificacao OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 16793)
-- Name: sqidprocesso; Type: SEQUENCE; Schema: shcliente; Owner: postgres
--

CREATE SEQUENCE sqidprocesso
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sqidprocesso OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 16795)
-- Name: sqidsaida; Type: SEQUENCE; Schema: shcliente; Owner: postgres
--

CREATE SEQUENCE sqidsaida
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sqidsaida OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 16797)
-- Name: sqidtipocontrato; Type: SEQUENCE; Schema: shcliente; Owner: postgres
--

CREATE SEQUENCE sqidtipocontrato
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sqidtipocontrato OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 16799)
-- Name: tipocontrato; Type: TABLE; Schema: shcliente; Owner: postgres
--

CREATE TABLE tipocontrato (
    idtipocontrato integer NOT NULL,
    nome character varying(200) NOT NULL
);


ALTER TABLE tipocontrato OWNER TO postgres;

--
-- TOC entry 2337 (class 0 OID 0)
-- Dependencies: 212
-- Name: COLUMN tipocontrato.idtipocontrato; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN tipocontrato.idtipocontrato IS 'Id do Tipo de Contrato';


--
-- TOC entry 2338 (class 0 OID 0)
-- Dependencies: 212
-- Name: COLUMN tipocontrato.nome; Type: COMMENT; Schema: shcliente; Owner: postgres
--

COMMENT ON COLUMN tipocontrato.nome IS 'Nome do Tipo de Contrato';


SET search_path = shadmin, pg_catalog;

--
-- TOC entry 2233 (class 0 OID 16722)
-- Dependencies: 187
-- Data for Name: logacessos; Type: TABLE DATA; Schema: shadmin; Owner: postgres
--

COPY logacessos (idlogacessos, idusuario, datahracesso, ipusuario) FROM stdin;
13	1	2018-11-21 00:17:44	127.0.0.1
14	1	2018-11-21 00:28:41	::1
15	1	2018-11-21 21:55:18	::1
16	7	2018-11-21 23:37:28	::1
17	1	2018-11-26 23:21:33	::1
18	1	2018-11-29 17:32:35	::1
19	1	2018-11-30 20:34:18	::1
20	1	2018-12-01 10:12:47	::1
21	1	2018-12-01 10:13:13	::1
22	1	2018-12-01 14:30:10	::1
23	1	2018-12-02 00:27:32	::1
24	1	2018-12-02 08:40:40	::1
25	1	2018-12-02 22:00:51	::1
26	7	2018-12-02 22:13:37	::1
27	1	2018-12-02 22:18:52	::1
28	1	2018-12-02 22:25:03	::1
29	1	2018-12-02 22:50:15	::1
30	1	2018-12-02 22:50:33	::1
31	1	2018-12-02 22:50:54	::1
32	1	2018-12-02 22:51:46	::1
33	1	2018-12-02 22:51:57	::1
34	1	2018-12-03 02:31:41	::1
35	1	2018-12-02 23:45:01	::1
36	8	2018-12-03 00:09:33	::1
37	1	2018-12-03 00:11:08	::1
38	1	2018-12-03 20:19:18	::1
\.


--
-- TOC entry 2339 (class 0 OID 0)
-- Dependencies: 188
-- Name: sqidlogacessos; Type: SEQUENCE SET; Schema: shadmin; Owner: postgres
--

SELECT pg_catalog.setval('sqidlogacessos', 38, true);


--
-- TOC entry 2340 (class 0 OID 0)
-- Dependencies: 189
-- Name: sqidusuario; Type: SEQUENCE SET; Schema: shadmin; Owner: postgres
--

SELECT pg_catalog.setval('sqidusuario', 8, true);


--
-- TOC entry 2236 (class 0 OID 16729)
-- Dependencies: 190
-- Data for Name: usuario; Type: TABLE DATA; Schema: shadmin; Owner: postgres
--

COPY usuario (idusuario, nome, email, senha, cpf, nvlacesso, datacriacaousuario, liberado) FROM stdin;
7	Auxiliar de Testes	teste@testes.adv	0349e1b82f0e13d8088d6cdfe2b2eb67	123123123	C	\N	1
1	Murilo Wippel	murilowippel@gmail.com	e10adc3949ba59abbe56e057f20f883e	05671257930	A	2018-10-13 15:58:12.767154	1
8	Unidavi	murilowippel@unidavi.edu.br	e10adc3949ba59abbe56e057f20f883e	12312312330	C	\N	1
\.


SET search_path = shcliente, pg_catalog;

--
-- TOC entry 2237 (class 0 OID 16732)
-- Dependencies: 191
-- Data for Name: atualizacaoprocesso; Type: TABLE DATA; Schema: shcliente; Owner: postgres
--

COPY atualizacaoprocesso (idatualizacaoprocesso, idprocesso, titulo, descricao, dataatualizacao, nmarquivo, extarquivo) FROM stdin;
11	13	Publicação do Processo no Tribunal	Publicação do Processo no Tribunal	2018-12-02 00:00:00	Atividade_Sociologia	docx
12	13	Convocação para audiência	Convocação para audiência.	2018-12-04 00:00:00	Use_Case_Model	pdf
\.


--
-- TOC entry 2238 (class 0 OID 16738)
-- Dependencies: 192
-- Data for Name: centrocusto; Type: TABLE DATA; Schema: shcliente; Owner: postgres
--

COPY centrocusto (idcentrocusto, nome) FROM stdin;
5	Processos Criminais
\.


--
-- TOC entry 2239 (class 0 OID 16741)
-- Dependencies: 193
-- Data for Name: cliente; Type: TABLE DATA; Schema: shcliente; Owner: postgres
--

COPY cliente (idcliente, nome, cpfcnpj, tppessoa, rua, numero, complemento, bairro, cidade, estado, telefone, celular, datanascimento, profissao, email, cep) FROM stdin;
46	José da Silva	10321321321	F	Rua do José	203		Centro	PG	SC		(47) 99999-9999	1997-06-21			89150-000
47	Francisco Silveira	05671257930	F	Rua do Chico	400		Jardim América	Rio do Sul	SC		(32) 13123-2132	1997-06-21			89898-989
\.


--
-- TOC entry 2240 (class 0 OID 16747)
-- Dependencies: 194
-- Data for Name: compromisso; Type: TABLE DATA; Schema: shcliente; Owner: postgres
--

COPY compromisso (idcompromisso, titulo, descricao, datacompromisso, horariocompromisso, local, idusuarioresponsavel) FROM stdin;
31	Reunião com Clientes	Reunião com Clientes	2018-12-03	10:10:00	Sala de Reuniões	1
29	Audiência	Audiência	2018-12-03	10:00:00	Fórum de Pres. Getúlio	1
32	Assessoria Jurídica na Empresa XYZ	Reunião para prestação de assessoria Jurídica	2018-12-03	13:30:00	Sede da Empresa	1,8
\.


--
-- TOC entry 2241 (class 0 OID 16753)
-- Dependencies: 195
-- Data for Name: contrato; Type: TABLE DATA; Schema: shcliente; Owner: postgres
--

COPY contrato (idcontrato, idcliente, idtipocontrato, titulo, descricao, nmarquivo, datainiciovigencia, datafimvigencia, extarquivo) FROM stdin;
36	46	9	Contrato de Assessoria - Empresa xyz	teste	Jose_da_Silva-artigoricardo	2010-10-10	\N	docx
37	46	12	Contrato de Prestação de Serviços	Prestação de serviços advocatícios para o sr. José da Silva	Jose_da_Silva-Horas_Complementares	2018-01-01	\N	pdf
\.


--
-- TOC entry 2242 (class 0 OID 16759)
-- Dependencies: 196
-- Data for Name: documento; Type: TABLE DATA; Schema: shcliente; Owner: postgres
--

COPY documento (iddocumento, nome, idusuariocriador, datacadastro, nmarquivo, extarquivo) FROM stdin;
\.


--
-- TOC entry 2243 (class 0 OID 16762)
-- Dependencies: 197
-- Data for Name: entrada; Type: TABLE DATA; Schema: shcliente; Owner: postgres
--

COPY entrada (identrada, idcentrocusto, idcliente, descricao, valor, datavencimento, datapagamento) FROM stdin;
7	5	\N	Honorários do processo 123	1000.00	2018-12-05	\N
8	5	47	Honorários do sr. Francisco Silveira	1000.00	2018-12-06	\N
\.


--
-- TOC entry 2244 (class 0 OID 16765)
-- Dependencies: 198
-- Data for Name: notificacao; Type: TABLE DATA; Schema: shcliente; Owner: postgres
--

COPY notificacao (idnotificacao, titulo, dataenvio, flstatus, idusuariodestino) FROM stdin;
25	Você foi relacionado ao compromisso Assessoria Jurídica na Empresa XYZ	2018-12-03 20:26:00	\N	1
\.


--
-- TOC entry 2245 (class 0 OID 16768)
-- Dependencies: 199
-- Data for Name: processo; Type: TABLE DATA; Schema: shcliente; Owner: postgres
--

COPY processo (idprocesso, idcliente, titulo, numero, descricao, dataabertura, valorhonorario, idusuariocriador, idcontrato) FROM stdin;
13	46	Processo Recuperação Judicial	11		2020-10-10	500000.00	1	36
\.


--
-- TOC entry 2246 (class 0 OID 16774)
-- Dependencies: 200
-- Data for Name: saida; Type: TABLE DATA; Schema: shcliente; Owner: postgres
--

COPY saida (idsaida, idcentrocusto, descricao, valor, datavencimento, datapagamento) FROM stdin;
3	5	Reforma da calçada	1500.00	2018-12-10	\N
\.


--
-- TOC entry 2341 (class 0 OID 0)
-- Dependencies: 201
-- Name: sqidatualizacaoprocesso; Type: SEQUENCE SET; Schema: shcliente; Owner: postgres
--

SELECT pg_catalog.setval('sqidatualizacaoprocesso', 12, true);


--
-- TOC entry 2342 (class 0 OID 0)
-- Dependencies: 202
-- Name: sqidcentrocusto; Type: SEQUENCE SET; Schema: shcliente; Owner: postgres
--

SELECT pg_catalog.setval('sqidcentrocusto', 6, true);


--
-- TOC entry 2343 (class 0 OID 0)
-- Dependencies: 203
-- Name: sqidcliente; Type: SEQUENCE SET; Schema: shcliente; Owner: postgres
--

SELECT pg_catalog.setval('sqidcliente', 47, true);


--
-- TOC entry 2344 (class 0 OID 0)
-- Dependencies: 204
-- Name: sqidcompromisso; Type: SEQUENCE SET; Schema: shcliente; Owner: postgres
--

SELECT pg_catalog.setval('sqidcompromisso', 32, true);


--
-- TOC entry 2345 (class 0 OID 0)
-- Dependencies: 205
-- Name: sqidcontrato; Type: SEQUENCE SET; Schema: shcliente; Owner: postgres
--

SELECT pg_catalog.setval('sqidcontrato', 37, true);


--
-- TOC entry 2346 (class 0 OID 0)
-- Dependencies: 206
-- Name: sqiddocumento; Type: SEQUENCE SET; Schema: shcliente; Owner: postgres
--

SELECT pg_catalog.setval('sqiddocumento', 1, true);


--
-- TOC entry 2347 (class 0 OID 0)
-- Dependencies: 207
-- Name: sqidentrada; Type: SEQUENCE SET; Schema: shcliente; Owner: postgres
--

SELECT pg_catalog.setval('sqidentrada', 8, true);


--
-- TOC entry 2348 (class 0 OID 0)
-- Dependencies: 208
-- Name: sqidnotificacao; Type: SEQUENCE SET; Schema: shcliente; Owner: postgres
--

SELECT pg_catalog.setval('sqidnotificacao', 25, true);


--
-- TOC entry 2349 (class 0 OID 0)
-- Dependencies: 209
-- Name: sqidprocesso; Type: SEQUENCE SET; Schema: shcliente; Owner: postgres
--

SELECT pg_catalog.setval('sqidprocesso', 16, true);


--
-- TOC entry 2350 (class 0 OID 0)
-- Dependencies: 210
-- Name: sqidsaida; Type: SEQUENCE SET; Schema: shcliente; Owner: postgres
--

SELECT pg_catalog.setval('sqidsaida', 3, true);


--
-- TOC entry 2351 (class 0 OID 0)
-- Dependencies: 211
-- Name: sqidtipocontrato; Type: SEQUENCE SET; Schema: shcliente; Owner: postgres
--

SELECT pg_catalog.setval('sqidtipocontrato', 12, true);


--
-- TOC entry 2258 (class 0 OID 16799)
-- Dependencies: 212
-- Data for Name: tipocontrato; Type: TABLE DATA; Schema: shcliente; Owner: postgres
--

COPY tipocontrato (idtipocontrato, nome) FROM stdin;
9	Assessoria Jurídica
12	Prestação de Serviços
\.


SET search_path = shadmin, pg_catalog;

--
-- TOC entry 2081 (class 2606 OID 16803)
-- Name: logacessos pklogacessos; Type: CONSTRAINT; Schema: shadmin; Owner: postgres
--

ALTER TABLE ONLY logacessos
    ADD CONSTRAINT pklogacessos PRIMARY KEY (idlogacessos);


--
-- TOC entry 2083 (class 2606 OID 16805)
-- Name: usuario pkusuario; Type: CONSTRAINT; Schema: shadmin; Owner: postgres
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT pkusuario PRIMARY KEY (idusuario);


SET search_path = shcliente, pg_catalog;

--
-- TOC entry 2085 (class 2606 OID 16807)
-- Name: atualizacaoprocesso pkatualizacaoprocesso; Type: CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY atualizacaoprocesso
    ADD CONSTRAINT pkatualizacaoprocesso PRIMARY KEY (idatualizacaoprocesso);


--
-- TOC entry 2087 (class 2606 OID 16809)
-- Name: centrocusto pkcentrocusto; Type: CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY centrocusto
    ADD CONSTRAINT pkcentrocusto PRIMARY KEY (idcentrocusto);


--
-- TOC entry 2089 (class 2606 OID 16811)
-- Name: cliente pkcliente; Type: CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT pkcliente PRIMARY KEY (idcliente);


--
-- TOC entry 2091 (class 2606 OID 16813)
-- Name: compromisso pkcompromisso; Type: CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY compromisso
    ADD CONSTRAINT pkcompromisso PRIMARY KEY (idcompromisso);


--
-- TOC entry 2093 (class 2606 OID 16815)
-- Name: contrato pkcontrato; Type: CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY contrato
    ADD CONSTRAINT pkcontrato PRIMARY KEY (idcontrato);


--
-- TOC entry 2095 (class 2606 OID 16817)
-- Name: documento pkdocumento; Type: CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY documento
    ADD CONSTRAINT pkdocumento PRIMARY KEY (iddocumento);


--
-- TOC entry 2097 (class 2606 OID 16819)
-- Name: entrada pkentrada; Type: CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY entrada
    ADD CONSTRAINT pkentrada PRIMARY KEY (identrada);


--
-- TOC entry 2099 (class 2606 OID 16821)
-- Name: notificacao pknotificacao; Type: CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY notificacao
    ADD CONSTRAINT pknotificacao PRIMARY KEY (idnotificacao);


--
-- TOC entry 2101 (class 2606 OID 16823)
-- Name: processo pkprocesso; Type: CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY processo
    ADD CONSTRAINT pkprocesso PRIMARY KEY (idprocesso);


--
-- TOC entry 2103 (class 2606 OID 16825)
-- Name: saida pksaida; Type: CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY saida
    ADD CONSTRAINT pksaida PRIMARY KEY (idsaida);


--
-- TOC entry 2105 (class 2606 OID 16827)
-- Name: tipocontrato pktipocontrato; Type: CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY tipocontrato
    ADD CONSTRAINT pktipocontrato PRIMARY KEY (idtipocontrato);


SET search_path = shadmin, pg_catalog;

--
-- TOC entry 2106 (class 2606 OID 16828)
-- Name: logacessos fk_logacessos_usuario; Type: FK CONSTRAINT; Schema: shadmin; Owner: postgres
--

ALTER TABLE ONLY logacessos
    ADD CONSTRAINT fk_logacessos_usuario FOREIGN KEY (idusuario) REFERENCES usuario(idusuario);


SET search_path = shcliente, pg_catalog;

--
-- TOC entry 2107 (class 2606 OID 16833)
-- Name: atualizacaoprocesso fk_atualizacaoprocesso_processo; Type: FK CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY atualizacaoprocesso
    ADD CONSTRAINT fk_atualizacaoprocesso_processo FOREIGN KEY (idprocesso) REFERENCES processo(idprocesso);


--
-- TOC entry 2108 (class 2606 OID 16838)
-- Name: contrato fk_contrato_cliente; Type: FK CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY contrato
    ADD CONSTRAINT fk_contrato_cliente FOREIGN KEY (idcliente) REFERENCES cliente(idcliente);


--
-- TOC entry 2109 (class 2606 OID 16843)
-- Name: contrato fk_contrato_tipocontrato; Type: FK CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY contrato
    ADD CONSTRAINT fk_contrato_tipocontrato FOREIGN KEY (idtipocontrato) REFERENCES tipocontrato(idtipocontrato);


--
-- TOC entry 2110 (class 2606 OID 16848)
-- Name: documento fk_documento_usuario; Type: FK CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY documento
    ADD CONSTRAINT fk_documento_usuario FOREIGN KEY (idusuariocriador) REFERENCES shadmin.usuario(idusuario);


--
-- TOC entry 2111 (class 2606 OID 16853)
-- Name: entrada fk_entrada_cliente; Type: FK CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY entrada
    ADD CONSTRAINT fk_entrada_cliente FOREIGN KEY (idcliente) REFERENCES cliente(idcliente);


--
-- TOC entry 2113 (class 2606 OID 16858)
-- Name: notificacao fk_notificacao_usuario; Type: FK CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY notificacao
    ADD CONSTRAINT fk_notificacao_usuario FOREIGN KEY (idusuariodestino) REFERENCES shadmin.usuario(idusuario);


--
-- TOC entry 2114 (class 2606 OID 16863)
-- Name: processo fk_processo_contrato; Type: FK CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY processo
    ADD CONSTRAINT fk_processo_contrato FOREIGN KEY (idcontrato) REFERENCES contrato(idcontrato);


--
-- TOC entry 2115 (class 2606 OID 16868)
-- Name: saida fk_saida_centrocusto; Type: FK CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY saida
    ADD CONSTRAINT fk_saida_centrocusto FOREIGN KEY (idcentrocusto) REFERENCES centrocusto(idcentrocusto);


--
-- TOC entry 2112 (class 2606 OID 16873)
-- Name: entrada fk_transferencia_centrocusto; Type: FK CONSTRAINT; Schema: shcliente; Owner: postgres
--

ALTER TABLE ONLY entrada
    ADD CONSTRAINT fk_transferencia_centrocusto FOREIGN KEY (idcentrocusto) REFERENCES centrocusto(idcentrocusto);


-- Completed on 2018-12-03 20:37:56

--
-- PostgreSQL database dump complete
--

