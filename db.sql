PGDMP     !                
    |            bengkod    10.6    10.6 +               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false                        0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            !           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            "           1262    50058    bengkod    DATABASE     �   CREATE DATABASE bengkod WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
    DROP DATABASE bengkod;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            #           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            $           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    58263    dokter    TABLE     g   CREATE TABLE public.dokter (
    id bigint NOT NULL,
    nama text,
    alamat text,
    no_hp text
);
    DROP TABLE public.dokter;
       public         postgres    false    3            �            1259    58261    dokter_id_seq    SEQUENCE     v   CREATE SEQUENCE public.dokter_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.dokter_id_seq;
       public       postgres    false    3    201            %           0    0    dokter_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.dokter_id_seq OWNED BY public.dokter.id;
            public       postgres    false    200            �            1259    58274    pasien    TABLE     g   CREATE TABLE public.pasien (
    id bigint NOT NULL,
    nama text,
    alamat text,
    no_hp text
);
    DROP TABLE public.pasien;
       public         postgres    false    3            �            1259    58272    pasien_id_seq    SEQUENCE     v   CREATE SEQUENCE public.pasien_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.pasien_id_seq;
       public       postgres    false    203    3            &           0    0    pasien_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.pasien_id_seq OWNED BY public.pasien.id;
            public       postgres    false    202            �            1259    58285    periksa    TABLE     �   CREATE TABLE public.periksa (
    id bigint NOT NULL,
    id_dokter bigint,
    id_pasien bigint,
    tgl_periksa timestamp without time zone,
    catatan text,
    obat text
);
    DROP TABLE public.periksa;
       public         postgres    false    3            �            1259    58283    periksa_id_seq    SEQUENCE     w   CREATE SEQUENCE public.periksa_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.periksa_id_seq;
       public       postgres    false    205    3            '           0    0    periksa_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.periksa_id_seq OWNED BY public.periksa.id;
            public       postgres    false    204            �            1259    50059    todolist    TABLE     �   CREATE TABLE public.todolist (
    id integer NOT NULL,
    isi text,
    tgl_awal date,
    tgl_akhir date,
    status text
);
    DROP TABLE public.todolist;
       public         postgres    false    3            �            1259    50062    todolist_id_seq    SEQUENCE     �   CREATE SEQUENCE public.todolist_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.todolist_id_seq;
       public       postgres    false    3    196            (           0    0    todolist_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.todolist_id_seq OWNED BY public.todolist.id;
            public       postgres    false    197            �            1259    58252    users    TABLE     \   CREATE TABLE public.users (
    id bigint NOT NULL,
    username text,
    password text
);
    DROP TABLE public.users;
       public         postgres    false    3            �            1259    58250    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public       postgres    false    199    3            )           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
            public       postgres    false    198            �
           2604    58266 	   dokter id    DEFAULT     f   ALTER TABLE ONLY public.dokter ALTER COLUMN id SET DEFAULT nextval('public.dokter_id_seq'::regclass);
 8   ALTER TABLE public.dokter ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    200    201    201            �
           2604    58277 	   pasien id    DEFAULT     f   ALTER TABLE ONLY public.pasien ALTER COLUMN id SET DEFAULT nextval('public.pasien_id_seq'::regclass);
 8   ALTER TABLE public.pasien ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    202    203    203            �
           2604    58288 
   periksa id    DEFAULT     h   ALTER TABLE ONLY public.periksa ALTER COLUMN id SET DEFAULT nextval('public.periksa_id_seq'::regclass);
 9   ALTER TABLE public.periksa ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    205    204    205            �
           2604    50064    todolist id    DEFAULT     j   ALTER TABLE ONLY public.todolist ALTER COLUMN id SET DEFAULT nextval('public.todolist_id_seq'::regclass);
 :   ALTER TABLE public.todolist ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    197    196            �
           2604    58255    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    198    199    199                      0    58263    dokter 
   TABLE DATA               9   COPY public.dokter (id, nama, alamat, no_hp) FROM stdin;
    public       postgres    false    201   �(                 0    58274    pasien 
   TABLE DATA               9   COPY public.pasien (id, nama, alamat, no_hp) FROM stdin;
    public       postgres    false    203   �)                 0    58285    periksa 
   TABLE DATA               W   COPY public.periksa (id, id_dokter, id_pasien, tgl_periksa, catatan, obat) FROM stdin;
    public       postgres    false    205   #*                 0    50059    todolist 
   TABLE DATA               H   COPY public.todolist (id, isi, tgl_awal, tgl_akhir, status) FROM stdin;
    public       postgres    false    196   y*                 0    58252    users 
   TABLE DATA               7   COPY public.users (id, username, password) FROM stdin;
    public       postgres    false    199   D+       *           0    0    dokter_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.dokter_id_seq', 3, true);
            public       postgres    false    200            +           0    0    pasien_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.pasien_id_seq', 3, true);
            public       postgres    false    202            ,           0    0    periksa_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.periksa_id_seq', 2, true);
            public       postgres    false    204            -           0    0    todolist_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.todolist_id_seq', 11, true);
            public       postgres    false    197            .           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 5, true);
            public       postgres    false    198            �
           2606    58271    dokter dokter_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.dokter
    ADD CONSTRAINT dokter_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.dokter DROP CONSTRAINT dokter_pkey;
       public         postgres    false    201            �
           2606    58282    pasien pasien_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.pasien
    ADD CONSTRAINT pasien_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.pasien DROP CONSTRAINT pasien_pkey;
       public         postgres    false    203            �
           2606    58293    periksa periksa_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.periksa
    ADD CONSTRAINT periksa_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.periksa DROP CONSTRAINT periksa_pkey;
       public         postgres    false    205            �
           2606    50072    todolist todolist_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.todolist
    ADD CONSTRAINT todolist_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.todolist DROP CONSTRAINT todolist_pkey;
       public         postgres    false    196            �
           2606    58260    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    199               �   x�%̱� @���} !�UKǺ�Ԥ���qy�!��P��/��é�#�c@`(��Kp1.V>��p�Dz��1�Ŕ���p<���x�����(�������q�]'
�0Z��X�n'��J+����
5*N         �   x��A� �p� Bj�KS��Mj��EI!�(,���n3ӳc�xydv]%�%d��KDt󂆐be���vz�+��PMD���/g���b��[�*htI#�o4��6��`��k~���/�q&�         F   x�3�4B##]CC]CC+S+N�ļ��<��ļ��l��Լ����NǼ�̼L ������ �+`         �   x�M�M�0�u{�� �E�g�w�D]�yHc�LK���	�{������lБF������[W�T�Y"��܎1l��`��]ah��Ud����t8����P:�|�;To*��ɩ-��]B	͗Q垈�]���t�<>g���H��:~،gڶ5u������|55��\+n��h�R�            x�=�Kn�@  еs���F`'� ��3�T��N����$�&�bɍ�����������j�ܣ�03��B��u��#ټ���C����4 ܌�>Jw�l������l�W�aj�q#g�7��WJmh�gU�n�Y�>J18Y1�5�v�yZ�Q��#b|�$�H��8�#�BSȵ�V�;��o�K���T�B\���'����F����~Rݺ�2�)�@ �a�����ʆ�ŧ��!K1�����t��,Y��k$��ޘ�&s� �2 �7\�m�     