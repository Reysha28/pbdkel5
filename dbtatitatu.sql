PGDMP         #                z         
   dbtatitatu    14.2    14.2 ,    4           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            5           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            6           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            7           1262    40960 
   dbtatitatu    DATABASE     n   CREATE DATABASE dbtatitatu WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_United States.1252';
    DROP DATABASE dbtatitatu;
                postgres    false            �            1259    40961    tabel_barang    TABLE     %  CREATE TABLE public.tabel_barang (
    id_barang character varying NOT NULL,
    id_katbarang character varying NOT NULL,
    nama_barang character varying NOT NULL,
    warna_barang character varying NOT NULL,
    harga_barang double precision NOT NULL,
    stok_tersedia integer NOT NULL
);
     DROP TABLE public.tabel_barang;
       public         heap    postgres    false            �            1259    40966    tabel_detail_restok    TABLE     �   CREATE TABLE public.tabel_detail_restok (
    id_restok character varying NOT NULL,
    id_barang character varying NOT NULL,
    tambah_stok integer NOT NULL
);
 '   DROP TABLE public.tabel_detail_restok;
       public         heap    postgres    false            �            1259    40971    tabel_detail_transaksi    TABLE     �   CREATE TABLE public.tabel_detail_transaksi (
    id_penjualan character varying NOT NULL,
    id_barang character varying NOT NULL,
    qty integer NOT NULL,
    total_harga double precision NOT NULL
);
 *   DROP TABLE public.tabel_detail_transaksi;
       public         heap    postgres    false            �            1259    40976    tabel_kategori_barang    TABLE     �   CREATE TABLE public.tabel_kategori_barang (
    id_katbarang character varying NOT NULL,
    kategori_barang character varying NOT NULL
);
 )   DROP TABLE public.tabel_kategori_barang;
       public         heap    postgres    false            �            1259    40981    tabel_kategori_pengeluaran    TABLE     �   CREATE TABLE public.tabel_kategori_pengeluaran (
    id_katpengeluaran character varying NOT NULL,
    jenis_pengeluaran character varying NOT NULL
);
 .   DROP TABLE public.tabel_kategori_pengeluaran;
       public         heap    postgres    false            �            1259    40986    tabel_pegawai    TABLE     l  CREATE TABLE public.tabel_pegawai (
    id_pegawai character varying NOT NULL,
    id_role integer NOT NULL,
    nama_pegawai character varying NOT NULL,
    status_pegawai character varying NOT NULL,
    telepon character varying NOT NULL,
    alamat character varying NOT NULL,
    username character varying NOT NULL,
    password character varying NOT NULL
);
 !   DROP TABLE public.tabel_pegawai;
       public         heap    postgres    false            �            1259    40991    tabel_pengeluaran    TABLE       CREATE TABLE public.tabel_pengeluaran (
    id_pengeluaran character varying NOT NULL,
    id_pegawai character varying NOT NULL,
    id_katpengeluaran character varying NOT NULL,
    harga double precision NOT NULL,
    tanggal_pengeluaran date NOT NULL
);
 %   DROP TABLE public.tabel_pengeluaran;
       public         heap    postgres    false            �            1259    40996    tabel_restok    TABLE     �   CREATE TABLE public.tabel_restok (
    id_restok character varying NOT NULL,
    id_pegawai character varying NOT NULL,
    tanggal_masuk date NOT NULL
);
     DROP TABLE public.tabel_restok;
       public         heap    postgres    false            �            1259    41001 
   tabel_role    TABLE     k   CREATE TABLE public.tabel_role (
    id_role integer NOT NULL,
    nama_role character varying NOT NULL
);
    DROP TABLE public.tabel_role;
       public         heap    postgres    false            �            1259    41006    tabel_transaksi    TABLE     �   CREATE TABLE public.tabel_transaksi (
    id_penjualan character varying NOT NULL,
    id_pegawai character varying NOT NULL,
    pembeli character varying NOT NULL,
    tanggal_penjualan date NOT NULL
);
 #   DROP TABLE public.tabel_transaksi;
       public         heap    postgres    false            (          0    40961    tabel_barang 
   TABLE DATA           w   COPY public.tabel_barang (id_barang, id_katbarang, nama_barang, warna_barang, harga_barang, stok_tersedia) FROM stdin;
    public          postgres    false    209   Y<       )          0    40966    tabel_detail_restok 
   TABLE DATA           P   COPY public.tabel_detail_restok (id_restok, id_barang, tambah_stok) FROM stdin;
    public          postgres    false    210   �<       *          0    40971    tabel_detail_transaksi 
   TABLE DATA           [   COPY public.tabel_detail_transaksi (id_penjualan, id_barang, qty, total_harga) FROM stdin;
    public          postgres    false    211   �<       +          0    40976    tabel_kategori_barang 
   TABLE DATA           N   COPY public.tabel_kategori_barang (id_katbarang, kategori_barang) FROM stdin;
    public          postgres    false    212   �<       ,          0    40981    tabel_kategori_pengeluaran 
   TABLE DATA           Z   COPY public.tabel_kategori_pengeluaran (id_katpengeluaran, jenis_pengeluaran) FROM stdin;
    public          postgres    false    213   o=       -          0    40986    tabel_pegawai 
   TABLE DATA              COPY public.tabel_pegawai (id_pegawai, id_role, nama_pegawai, status_pegawai, telepon, alamat, username, password) FROM stdin;
    public          postgres    false    214   �=       .          0    40991    tabel_pengeluaran 
   TABLE DATA           v   COPY public.tabel_pengeluaran (id_pengeluaran, id_pegawai, id_katpengeluaran, harga, tanggal_pengeluaran) FROM stdin;
    public          postgres    false    215   �>       /          0    40996    tabel_restok 
   TABLE DATA           L   COPY public.tabel_restok (id_restok, id_pegawai, tanggal_masuk) FROM stdin;
    public          postgres    false    216   ?       0          0    41001 
   tabel_role 
   TABLE DATA           8   COPY public.tabel_role (id_role, nama_role) FROM stdin;
    public          postgres    false    217   +?       1          0    41006    tabel_transaksi 
   TABLE DATA           _   COPY public.tabel_transaksi (id_penjualan, id_pegawai, pembeli, tanggal_penjualan) FROM stdin;
    public          postgres    false    218   �?       �           2606    41012    tabel_barang tabel_barang_pk 
   CONSTRAINT     a   ALTER TABLE ONLY public.tabel_barang
    ADD CONSTRAINT tabel_barang_pk PRIMARY KEY (id_barang);
 F   ALTER TABLE ONLY public.tabel_barang DROP CONSTRAINT tabel_barang_pk;
       public            postgres    false    209            �           2606    41014 *   tabel_detail_restok tabel_detail_restok_pk 
   CONSTRAINT     z   ALTER TABLE ONLY public.tabel_detail_restok
    ADD CONSTRAINT tabel_detail_restok_pk PRIMARY KEY (id_restok, id_barang);
 T   ALTER TABLE ONLY public.tabel_detail_restok DROP CONSTRAINT tabel_detail_restok_pk;
       public            postgres    false    210    210            �           2606    41016 0   tabel_detail_transaksi tabel_detail_transaksi_pk 
   CONSTRAINT     �   ALTER TABLE ONLY public.tabel_detail_transaksi
    ADD CONSTRAINT tabel_detail_transaksi_pk PRIMARY KEY (id_penjualan, id_barang);
 Z   ALTER TABLE ONLY public.tabel_detail_transaksi DROP CONSTRAINT tabel_detail_transaksi_pk;
       public            postgres    false    211    211            �           2606    41018 .   tabel_kategori_barang tabel_kategori_barang_pk 
   CONSTRAINT     v   ALTER TABLE ONLY public.tabel_kategori_barang
    ADD CONSTRAINT tabel_kategori_barang_pk PRIMARY KEY (id_katbarang);
 X   ALTER TABLE ONLY public.tabel_kategori_barang DROP CONSTRAINT tabel_kategori_barang_pk;
       public            postgres    false    212            �           2606    41020 8   tabel_kategori_pengeluaran tabel_kategori_pengeluaran_pk 
   CONSTRAINT     �   ALTER TABLE ONLY public.tabel_kategori_pengeluaran
    ADD CONSTRAINT tabel_kategori_pengeluaran_pk PRIMARY KEY (id_katpengeluaran);
 b   ALTER TABLE ONLY public.tabel_kategori_pengeluaran DROP CONSTRAINT tabel_kategori_pengeluaran_pk;
       public            postgres    false    213            �           2606    41022    tabel_pegawai tabel_pegawai_pk 
   CONSTRAINT     d   ALTER TABLE ONLY public.tabel_pegawai
    ADD CONSTRAINT tabel_pegawai_pk PRIMARY KEY (id_pegawai);
 H   ALTER TABLE ONLY public.tabel_pegawai DROP CONSTRAINT tabel_pegawai_pk;
       public            postgres    false    214            �           2606    41024 &   tabel_pengeluaran tabel_pengeluaran_pk 
   CONSTRAINT     p   ALTER TABLE ONLY public.tabel_pengeluaran
    ADD CONSTRAINT tabel_pengeluaran_pk PRIMARY KEY (id_pengeluaran);
 P   ALTER TABLE ONLY public.tabel_pengeluaran DROP CONSTRAINT tabel_pengeluaran_pk;
       public            postgres    false    215            �           2606    41026    tabel_restok tabel_restok_pk 
   CONSTRAINT     a   ALTER TABLE ONLY public.tabel_restok
    ADD CONSTRAINT tabel_restok_pk PRIMARY KEY (id_restok);
 F   ALTER TABLE ONLY public.tabel_restok DROP CONSTRAINT tabel_restok_pk;
       public            postgres    false    216            �           2606    41028    tabel_role tabel_role_pk 
   CONSTRAINT     [   ALTER TABLE ONLY public.tabel_role
    ADD CONSTRAINT tabel_role_pk PRIMARY KEY (id_role);
 B   ALTER TABLE ONLY public.tabel_role DROP CONSTRAINT tabel_role_pk;
       public            postgres    false    217            �           2606    41030 "   tabel_transaksi tabel_transaksi_pk 
   CONSTRAINT     j   ALTER TABLE ONLY public.tabel_transaksi
    ADD CONSTRAINT tabel_transaksi_pk PRIMARY KEY (id_penjualan);
 L   ALTER TABLE ONLY public.tabel_transaksi DROP CONSTRAINT tabel_transaksi_pk;
       public            postgres    false    218            �           2606    41031 7   tabel_detail_restok tabel_barang_tabel_detail_restok_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.tabel_detail_restok
    ADD CONSTRAINT tabel_barang_tabel_detail_restok_fk FOREIGN KEY (id_barang) REFERENCES public.tabel_barang(id_barang);
 a   ALTER TABLE ONLY public.tabel_detail_restok DROP CONSTRAINT tabel_barang_tabel_detail_restok_fk;
       public          postgres    false    209    3200    210            �           2606    41036 =   tabel_detail_transaksi tabel_barang_tabel_detail_transaksi_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.tabel_detail_transaksi
    ADD CONSTRAINT tabel_barang_tabel_detail_transaksi_fk FOREIGN KEY (id_barang) REFERENCES public.tabel_barang(id_barang);
 g   ALTER TABLE ONLY public.tabel_detail_transaksi DROP CONSTRAINT tabel_barang_tabel_detail_transaksi_fk;
       public          postgres    false    211    209    3200            �           2606    41041 2   tabel_barang tabel_kategori_barang_tabel_barang_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.tabel_barang
    ADD CONSTRAINT tabel_kategori_barang_tabel_barang_fk FOREIGN KEY (id_katbarang) REFERENCES public.tabel_kategori_barang(id_katbarang);
 \   ALTER TABLE ONLY public.tabel_barang DROP CONSTRAINT tabel_kategori_barang_tabel_barang_fk;
       public          postgres    false    209    3206    212            �           2606    41046 A   tabel_pengeluaran tabel_kategori_pengeluaran_tabel_pengeluaran_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.tabel_pengeluaran
    ADD CONSTRAINT tabel_kategori_pengeluaran_tabel_pengeluaran_fk FOREIGN KEY (id_katpengeluaran) REFERENCES public.tabel_kategori_pengeluaran(id_katpengeluaran);
 k   ALTER TABLE ONLY public.tabel_pengeluaran DROP CONSTRAINT tabel_kategori_pengeluaran_tabel_pengeluaran_fk;
       public          postgres    false    3208    213    215            �           2606    41051 4   tabel_pengeluaran tabel_pegawai_tabel_pengeluaran_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.tabel_pengeluaran
    ADD CONSTRAINT tabel_pegawai_tabel_pengeluaran_fk FOREIGN KEY (id_pegawai) REFERENCES public.tabel_pegawai(id_pegawai);
 ^   ALTER TABLE ONLY public.tabel_pengeluaran DROP CONSTRAINT tabel_pegawai_tabel_pengeluaran_fk;
       public          postgres    false    3210    214    215            �           2606    41056 0   tabel_transaksi tabel_pegawai_tabel_penjualan_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.tabel_transaksi
    ADD CONSTRAINT tabel_pegawai_tabel_penjualan_fk FOREIGN KEY (id_pegawai) REFERENCES public.tabel_pegawai(id_pegawai);
 Z   ALTER TABLE ONLY public.tabel_transaksi DROP CONSTRAINT tabel_pegawai_tabel_penjualan_fk;
       public          postgres    false    214    218    3210            �           2606    41061 *   tabel_restok tabel_pegawai_tabel_restok_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.tabel_restok
    ADD CONSTRAINT tabel_pegawai_tabel_restok_fk FOREIGN KEY (id_pegawai) REFERENCES public.tabel_pegawai(id_pegawai);
 T   ALTER TABLE ONLY public.tabel_restok DROP CONSTRAINT tabel_pegawai_tabel_restok_fk;
       public          postgres    false    216    214    3210            �           2606    41066 7   tabel_detail_restok tabel_restok_tabel_detail_restok_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.tabel_detail_restok
    ADD CONSTRAINT tabel_restok_tabel_detail_restok_fk FOREIGN KEY (id_restok) REFERENCES public.tabel_restok(id_restok);
 a   ALTER TABLE ONLY public.tabel_detail_restok DROP CONSTRAINT tabel_restok_tabel_detail_restok_fk;
       public          postgres    false    3214    216    210            �           2606    41071 )   tabel_pegawai tabel_role_tabel_pegawai_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.tabel_pegawai
    ADD CONSTRAINT tabel_role_tabel_pegawai_fk FOREIGN KEY (id_role) REFERENCES public.tabel_role(id_role);
 S   ALTER TABLE ONLY public.tabel_pegawai DROP CONSTRAINT tabel_role_tabel_pegawai_fk;
       public          postgres    false    217    214    3216            �           2606    41076 @   tabel_detail_transaksi tabel_transaksi_tabel_detail_transaksi_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.tabel_detail_transaksi
    ADD CONSTRAINT tabel_transaksi_tabel_detail_transaksi_fk FOREIGN KEY (id_penjualan) REFERENCES public.tabel_transaksi(id_penjualan);
 j   ALTER TABLE ONLY public.tabel_detail_transaksi DROP CONSTRAINT tabel_transaksi_tabel_detail_transaksi_fk;
       public          postgres    false    211    218    3218            (   V   x�ʡ� �|�W��¦v,,Z-�|��WN>����%լ�l�֖��2,)�t�Y��ٴ�9bm%>��6L=:�9����d      )      x������ � �      *      x������ � �      +   f   x�s200���N,QJ�M*-�r200��N�)�K��9�R2�eM8�K�|��S�@"���9��f��y%��9�sjQnf�m�雘��Z����� �� �      ,   X   x�s600�tJ�H�S�M�+I��r600��8�x��ƜN�yřy �	�OfqIQf6�c�鞘�	b�q:e&V&*x�&�g5s��qqq �)      -   �   x�U��n�0���+����,B톖vQ��Q�cv�����;A�ě���s&H)AAh#�{*m���X>�[Y)h	S�bE}&��.ҙN }�vJ9m��'�I,0p[����F3����cH�O���{91�q[,l�/�ѿb"x�|�_L�bjc|S�n��D,#/ߙ�+Fl�4���)�#�?������k<S�c���~^;��x�:��{ ����� znZ      .   4   x�s100�t400�t�LAL###]#]C.#$ySyc�=... ��      /      x������ � �      0   M   x�%�K� �u�)<���Ӹy	H�B%��w��f���Uj,�հ��k�.}�j{�k]q�Ϭ�D����Y�	���=      1      x������ � �     