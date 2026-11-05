# Test Case Manual - Pertemuan 10

| No | Skenario | Input utama | Hasil yang diharapkan | Hasil aktual | Status |
|----|----------|-------------|------------------------|--------------|--------|
| 1 | Simpan data valid | Semua field valid | Tersimpan, redirect ke index, pesan sukses | | Lulus / Gagal |
| 2 | Kode kosong | code kosong | Validasi gagal, data tidak tersimpan | | Lulus / Gagal |
| 3 | Kode duplikat | WEB-101 kedua kali | Ditolak oleh rule unique | | Lulus / Gagal |
| 4 | Nama kosong | name kosong | Validasi gagal | | Lulus / Gagal |
| 5 | Biaya negatif | fee = -1000 | Ditolak karena min:0 | | Lulus / Gagal |
| 6 | Kuota 0 | quota = 0 | Ditolak karena min:1 | | Lulus / Gagal |
| 7 | Status tidak valid | status = active | Ditolak, hanya draft/open/closed | | Lulus / Gagal |
| 8 | Daftar tampil ulang | Reload /courses | Data tetap ada dari MySQL | | Lulus / Gagal |