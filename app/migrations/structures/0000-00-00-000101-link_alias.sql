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
-- Name: link_alias; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE link_alias (
    id integer NOT NULL,
    link_id integer NOT NULL,
    value integer NOT NULL,
    "primary" boolean
);


--
-- Name: link_alias_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE link_alias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: link_alias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE link_alias_id_seq OWNED BY link_alias.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY link_alias ALTER COLUMN id SET DEFAULT nextval('link_alias_id_seq'::regclass);


--
-- Name: link_alias_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY link_alias
    ADD CONSTRAINT link_alias_id PRIMARY KEY (id);


--
-- Name: link_alias_link_id_primary; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY link_alias
    ADD CONSTRAINT link_alias_link_id_primary UNIQUE (link_id, "primary") DEFERRABLE INITIALLY DEFERRED;


--
-- Name: link_alias_value; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY link_alias
    ADD CONSTRAINT link_alias_value UNIQUE (value);


--
-- Name: link_alias_link_id; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX link_alias_link_id ON link_alias USING btree (link_id);


--
-- Name: link_alias_link_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY link_alias
    ADD CONSTRAINT link_alias_link_id_fkey FOREIGN KEY (link_id) REFERENCES link(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: link_alias_value_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY link_alias
    ADD CONSTRAINT link_alias_value_fkey FOREIGN KEY (value) REFERENCES translation(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

