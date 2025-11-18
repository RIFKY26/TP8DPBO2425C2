# Janji
Saya, **Rifky Fadhillah Akbar** dengan NIM **2401248**, mengerjakan tugas praktikum 9 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahan-Nya, maka saya tidak akan melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

---

# Desain Database

Database `tp_mvc25` terdiri dari tiga tabel utama yang saling berelasi, dirancang untuk mengelola data akademik universitas secara efisien.

### 📄 1. Table: `majors`
Menyimpan informasi mengenai Jurusan atau Program Studi yang tersedia.

| Atribut | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `INT(11)` | **Primary Key**, Auto Increment. Identitas unik jurusan. |
| **name** | `VARCHAR(100)` | Nama lengkap jurusan (misal: Teknik Informatika). |

* **Relasi:** Satu jurusan menampung banyak dosen (*One-to-Many*).

### 📄 2. Table: `lecturers`
Menyimpan data Dosen pengajar yang bernaung di bawah jurusan tertentu.

| Atribut | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `INT(11)` | **Primary Key**, Auto Increment. Identitas unik dosen. |
| **name** | `VARCHAR(100)` | Nama lengkap dosen beserta gelar. |
| **nidn** | `VARCHAR(20)` | Nomor Induk Dosen Nasional. |
| **phone** | `VARCHAR(15)` | Nomor telepon dosen. |
| **join_date** | `DATE` | Tanggal dosen mulai bergabung. |
| **major_id** | `INT(11)` | **Foreign Key** → `majors.id`. Menunjukkan jurusan tempat dosen bernaung. |

**Relasi:** 
     Setiap dosen terdaftar di 1 jurusan (`lecturers.major_id` → `majors.id`).
     Satu dosen dapat mengampu banyak mata kuliah (*One-to-Many*).

### 📄 3. Table: `subjects`
Menyimpan daftar Mata Kuliah yang diajarkan beserta detail pengampunya.

| Atribut | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `INT(11)` | **Primary Key**, Auto Increment. Identitas unik mata kuliah. |
| **subject_code** | `VARCHAR(10)` | Kode mata kuliah (misal: IK212). |
| **subject_name** | `VARCHAR(100)` | Nama mata kuliah. |
| **sks** | `INT(11)` | Jumlah Satuan Kredit Semester. |
| **lecturer_id** | `INT(11)` | **Foreign Key** → `lecturers.id`. Dosen yang bertanggung jawab mengajar. |

* **Relasi:** Setiap mata kuliah diampu oleh 1 dosen (`subjects.lecturer_id` → `lecturers.id`).

---

Major → Lecturers : One to Many (Satu Jurusan memiliki Banyak Dosen)

Lecturer → Subjects : One to Many (Satu Dosen mengampu Banyak Mata Kuliah)

# Fitur Yang Tersedia
- CRUD Lecturer : Pengguna dapat menambah, mengedit, menghapus, dan melihat daftar dosen lengkap dengan jurusan asal mereka.

- CRUD Major : Pengguna dapat mengelola data referensi jurusan/prodi di universitas.

- CRUD Subject : Pengguna dapat mengatur data mata kuliah, menentukan bobot SKS, dan memilih dosen pengampunya.

# Alur Program (Flow Execution)
- Aplikasi ini berjalan mengikuti pola arsitektur MVC (Model-View-Controller) dengan alur sebagai berikut:

- Request: User membuka URL di browser (contoh: index.php?controller=Lecturer&action=index) dan mengirim permintaan ke server.

- Routing (Front Controller): File index.php menerima request tersebut. Ia memparsing parameter controller dan action untuk menentukan Controller mana yang harus dipanggil.

- Controller Logic: Controller yang sesuai (misal LecturerController) diinstansiasi. Controller kemudian memproses logika bisnis, misalnya memvalidasi input pengguna.

- Model Interaction: Jika data dibutuhkan, Controller memanggil Model (misal Lecturer.php). Model berinteraksi langsung dengan database tp_mvc25 menggunakan Prepared Statements untuk melakukan operasi CRUD (Create, Read, Update, Delete) secara aman.

- View Rendering: Setelah mendapatkan data dari Model, Controller mengirimkan data tersebut ke View (misal LecturerViews.php). View menyusun tampilan HTML yang user-friendly menggunakan template Bootstrap.

- Response: Browser menerima halaman HTML yang sudah jadi dan menampilkannya kepada User.

- Error Handling: Jika halaman atau aksi tidak ditemukan, sistem akan menampilkan pesan error sederhana tanpa menyebabkan aplikasi crash.

# Dokumentasi


https://github.com/user-attachments/assets/4b581f26-fb03-429f-b0fe-c65fa2eb040e

