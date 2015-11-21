--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: link_parameter; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE link_parameter (
    id integer NOT NULL,
    link_id integer NOT NULL,
    key character varying NOT NULL,
    value character varying NOT NULL
);


--
-- Name: link_parameter_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE link_parameter_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: link_parameter_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE link_parameter_id_seq OWNED BY link_parameter.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY link_parameter ALTER COLUMN id SET DEFAULT nextval('link_parameter_id_seq'::regclass);


--
-- Name: link_parameter_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY link_parameter
    ADD CONSTRAINT link_parameter_id PRIMARY KEY (id);


--
-- Name: link_parameter_link_id_key; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY link_parameter
    ADD CONSTRAINT link_parameter_link_id_key UNIQUE (link_id, key);


--
-- Name: link_parameter_key; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX link_parameter_key ON link_parameter USING btree (key);


--
-- Name: link_parameter_value; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX link_parameter_value ON link_parameter USING btree (value);


--
-- Name: link_parameter_link_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY link_parameter
    ADD CONSTRAINT link_parameter_link_id_fkey FOREIGN KEY (link_id) REFERENCES link(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

