
CREATE TABLE prodi (
      id int AUTO_INCREMENT,
      nama ENUM("Informatika","Sistem Informasi"),
      updated_at DATE,
      created_at DATE,
      PRIMARY KEY (id)
  );

CREATE TABLE semester (
  id int AUTO_INCREMENT,
  nama varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE peran (
  id int AUTO_INCREMENT,
  nama varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
      PRIMARY KEY (id)
) ;

CREATE TABLE user (
  id int AUTO_INCREMENT,
  name VARCHAR(45),
  nim VARCHAR(12) UNIQUE,
  nidn VARCHAR(12) UNIQUE,
  email VARCHAR(45) UNIQUE,
  password VARCHAR(191),
  tlahir VARCHAR(45),
  tgllahir DATE,
  role ENUM('admin','mahasiswa','dosen','scrum master'),
  gender ENUM('Pria','Wanita'),
  nohp VARCHAR(45),
  foto VARCHAR(150) DEFAULT 'public/hasil/team-1-800x800.jpeg',
  prodi_id INT,
  fingerprint_code VARCHAR(45),
  remember_token VARCHAR(100),
  pin varchar(191) DEFAULT NULL,
  updated_at DATE,
  created_at DATE,
  PRIMARY KEY (id),
  FOREIGN KEY (prodi_id) REFERENCES prodi(id)
);

CREATE TABLE mata_kuliah (
  id int AUTO_INCREMENT,
  nama varchar(255) NOT NULL,
  user_id int NOT NULL,
      PRIMARY KEY (id),
      FOREIGN KEY (user_id) REFERENCES user(id)
) ;

CREATE TABLE tim (
  id int AUTO_INCREMENT,
  nama varchar(255) NOT NULL,
  semester_id int NOT NULL,
  prodi_id int NOT NULL,
  final_skor double NOT NULL DEFAULT 0,
  created_by varchar(255) NOT NULL DEFAULT 'Scrum Master',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (prodi_id) REFERENCES prodi(id)
) ;

CREATE TABLE project (
  id int AUTO_INCREMENT,
  nama varchar(255) NOT NULL,
  deskripsi text NOT NULL,
  tanggal_mulai date NOT NULL,
  tanggal_akhir date NOT NULL,
  jumlah_sprint int(11) NOT NULL,
  budget double NOT NULL DEFAULT 0,
  status varchar(255) NOT NULL DEFAULT 'Baru',
  persen double NOT NULL DEFAULT 0,
  semester_id int NOT NULL,
  scrummaster_id int NOT NULL,
  tim_id int DEFAULT NULL,
  created_by varchar(255) NOT NULL DEFAULT 'Project Owner',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
      PRIMARY KEY (id),
      FOREIGN KEY (semester_id) REFERENCES semester(id),
      FOREIGN KEY (scrummaster_id) REFERENCES user(id),
      FOREIGN KEY (tim_id) REFERENCES tim(id)
) ;

CREATE TABLE sprint (
  id int AUTO_INCREMENT,
  project_id int,
  nama varchar(255) NOT NULL,
  deskripsi text NOT NULL,
  tgl_mulai date NOT NULL,
  tgl_selesai date NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  deleted_at timestamp NULL DEFAULT NULL,
      PRIMARY KEY (id),
      FOREIGN KEY (project_id) REFERENCES project(id)

) ;

-- kelompok6
CREATE TABLE kesulitan (
  id int AUTO_INCREMENT,
  nama_tingkat varchar(191) NOT NULL,
  bobot int(11) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
      PRIMARY KEY (id)
) ;

CREATE TABLE task (
  id int AUTO_INCREMENT,
  sprint_id int NOT NULL,
  nama varchar(255) NOT NULL,
  deskripsi text NOT NULL,
  tgl_mulai date NOT NULL,
  tgl_selesai date NOT NULL,
  status tinyint(1) NOT NULL,
  kesulitan_id int NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
      PRIMARY KEY (id),
      FOREIGN KEY (kesulitan_id) REFERENCES kesulitan(id)
) ;

-- kelompok5
CREATE TABLE log_project (
  id int AUTO_INCREMENT,
  tim_id int NOT NULL,
  tanggal date NOT NULL,
  hasil_log varchar(255) NOT NULL,
  kendala text NOT NULL,
  sprint_id int NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
      PRIMARY KEY (id),
      FOREIGN KEY (tim_id) REFERENCES tim(id),
      FOREIGN KEY (sprint_id) REFERENCES sprint(id)
) ;

CREATE TABLE log_project_task (
  id int AUTO_INCREMENT,
  log_project_id int NOT NULL,
  task_id int NOT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      PRIMARY KEY (id),
      FOREIGN KEY (task_id) REFERENCES task(id),
      FOREIGN KEY (log_project_id) REFERENCES log_project(id)

);

CREATE TABLE po_review (
  id int AUTO_INCREMENT,
  rekomendasi text NOT NULL,
  validasi tinyint(1) NOT NULL,
  log_project_id int NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
      PRIMARY KEY (id),
      FOREIGN KEY (log_project_id) REFERENCES log_project(id)
) ;

-- kelompok4
CREATE TABLE nilai_dosen (
  id int AUTO_INCREMENT,
  KetepatanWaktu double(8,2) NOT NULL,
  Kelengkapan double(8,2) NOT NULL,
  KualitasHasil double(8,2) NOT NULL,
  TotalNilai varchar(255) NOT NULL,
  tim_id int NOT NULL,
  user_id int NOT NULL,
  sprint_id int NOT NULL,
  matkul_id int NOT NULL,
  updated_at DATE,
      created_at DATE,
      PRIMARY KEY (id),
      FOREIGN KEY (user_id) REFERENCES user(id),
      FOREIGN KEY (tim_id) REFERENCES tim(id),
      FOREIGN KEY (sprint_id) REFERENCES sprint(id),
      FOREIGN KEY (matkul_id) REFERENCES mata_kuliah(id)
) ;

  CREATE TABLE point_tim (
      id int AUTO_INCREMENT,
      point DOUBLE DEFAULT 0,
      keterangan VARCHAR(45),
      tim_id int NOT NULL,
      sprint_id int,
      updated_at DATE,
      created_at DATE,
      dosen_scrum_master_id INT,
      status varchar(255) NOT NULL,
      user_id int NOT NULL,
      PRIMARY KEY (id),
      FOREIGN KEY (user_id) REFERENCES user(id),
      FOREIGN KEY (tim_id) REFERENCES tim(id),
      FOREIGN KEY (sprint_id) REFERENCES sprint(id),
      FOREIGN KEY (dosen_scrum_master_id) REFERENCES user(id)
  );

  CREATE TABLE nilai_sprint (
      id int AUTO_INCREMENT,
      nilai double(8,2) DEFAULT 0,
      point_sprint_id INT,
      nilai_dosen_id INT,
      tim_id INT,
      sprint_id INT,
      updated_at DATE,
      created_at DATE,
      PRIMARY KEY (id),
      FOREIGN KEY (point_sprint_id) REFERENCES point_tim(id),
      FOREIGN KEY (nilai_dosen_id) REFERENCES nilai_dosen(id),
      FOREIGN KEY (tim_id) REFERENCES tim(id),
      FOREIGN KEY (sprint_id) REFERENCES sprint(id)
  );

  CREATE TABLE nilai_tim (
      id int AUTO_INCREMENT,
      nilai_tim double(8,2) NOT NULL,
      final_nilai_sprint DOUBLE DEFAULT 0,
      nilai_uts DOUBLE DEFAULT 0,
      nilai_uas DOUBLE DEFAULT 0,
      final_skor DOUBLE DEFAULT 0,
      nilai_sprint_id INT,
      user_id INT,
      tim_id INT,
      sprint_id INT,
      updated_at DATE,
      created_at DATE,
      PRIMARY KEY (id),
      FOREIGN KEY (user_id) REFERENCES user(id),
      FOREIGN KEY (nilai_sprint_id) REFERENCES nilai_sprint(id),
      FOREIGN KEY (tim_id) REFERENCES tim(id),
      FOREIGN KEY (sprint_id) REFERENCES sprint(id)
  );

-- kelompok 3
CREATE TABLE tim_member (
  id int AUTO_INCREMENT,
  tim_id int NOT NULL,
  mahasiswa_id int NOT NULL,
  peran_id int,
  tanggung_jawab text,
  final_skor double NOT NULL DEFAULT 0,
  semester_id int,
  created_by varchar(255) NOT NULL DEFAULT 'Scrum Master',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (tim_id) REFERENCES tim(id),
  FOREIGN KEY (mahasiswa_id) REFERENCES user(id),
  FOREIGN KEY (peran_id) REFERENCES peran(id)
) ;



CREATE TABLE mvp (
  id int AUTO_INCREMENT,
  project_id int NOT NULL,
  sprint_id int(11) NOT NULL,
  tanggal_rilis date NOT NULL,
  deskripsi text NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
      PRIMARY KEY (id),
      FOREIGN KEY (project_id) REFERENCES project(id),
      FOREIGN KEY (sprint_id) REFERENCES sprint(id)
) ;

-- kelompok 2
CREATE TABLE absence_log (
  id int AUTO_INCREMENT,
  jam_mulai time NOT NULL,
  jam_akhir time NOT NULL,
  status_mulai enum('hadir','telat','alpha','izin','sakit') DEFAULT NULL,
  status_akhir enum('hadir','telat','alpha','izin','sakit') DEFAULT NULL,
  keterangan text,
  nilai int(11) DEFAULT NULL,
  sprint_id int DEFAULT NULL,
  user_id int DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
      PRIMARY KEY (id),
      FOREIGN KEY (user_id) REFERENCES user(id),
      FOREIGN KEY (sprint_id) REFERENCES sprint(id)
) ;

CREATE TABLE nilai_absen (
  id int AUTO_INCREMENT,
  nilai_absen int(11) NOT NULL,
  tim_id int(11) DEFAULT NULL,
  sprint_id int DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
      PRIMARY KEY (id),
      FOREIGN KEY (sprint_id) REFERENCES sprint(id),
      FOREIGN KEY (tim_id) REFERENCES tim(id)
) ;


-- kelompok 1
  CREATE TABLE point_member (
      id int AUTO_INCREMENT,
      point INT DEFAULT -1,
      keterangan VARCHAR(150),
      dosen_scrum_master_id INT,
      tim_member_id INT,
      sprint_id int,
      updated_at DATE,
      created_at DATE,
      PRIMARY KEY (id),
      FOREIGN KEY (dosen_scrum_master_id) REFERENCES user(id),
      FOREIGN KEY (tim_member_id) REFERENCES tim_member(id),
      FOREIGN KEY (sprint_id) REFERENCES sprint(id)
  );

  CREATE TABLE nilai_member (
      id int AUTO_INCREMENT,
      skor_member DOUBLE DEFAULT 0,
      skor_tim_id INT,
      tim_member_id INT,
      sprint_id int,
      updated_at DATE,
      created_at DATE,
      PRIMARY KEY (id),
      FOREIGN KEY (tim_member_id) REFERENCES tim_member(id),
      FOREIGN KEY (skor_tim_id) REFERENCES nilai_tim(id),
      FOREIGN KEY (sprint_id) REFERENCES sprint(id)
  );
