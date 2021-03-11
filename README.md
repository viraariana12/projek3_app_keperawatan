# Struktur Controller

1. Admin/
    - MasterKeperawatan/
        - SDKI/
            - Kategori/ @Azis1708
                - KategoriController
                - KategoriSubKategoriController
                - SubKategori/
                    - SubKategoriController
                    - SubKategoriKategoriController
                    - SubKategoriDiagnosisController
            - Penyebab/ @viraariana12
                - JenisPenyebabController
                - PenyebabController
                - PenyebabDiagnosisController
            - TandaDanGejala/ @viraariana12
                - TandaDanGejalaController
                - TandaDanGejalaDiagnosisController
            - KondisiKlinis/ @Azis1708
                - KondisiKlinisController
                - KondisiKlinisDiagnosisController
            - Relasi/ @dzikrafathin
                - DiagnosisKondisiKlinisController
                - DiagnosisTandaDanGejalaController
                - DiagnosisPenyebabController
                - DiagnosisSubKategoriController
            - DiagnosisController @dzikrafathin
            
        - SIKI/
        - SLKI/
        
2. Keperawatan/
3. RumahSakit/

# Struktur Model

Models ~ nama_tabel

1. MasterKeperawatan/
    - SDKI/
        - Kategori/
            - Kategori ~ kategori_diagnosis_keperawatan
            - SubKategori ~ sub_kategori_diagnosis_keperawatan
        
        - Penyebab/
            - Penyebab ~ penyebab
            - Jenis ~ jenis_penyebab
            
        - KondisiKlinis ~ kondisi_klinis
        - TandaDanGejala ~ tanda_dan_gejala
        - Diagnosis ~ diagnosis_keperawatan
        
2. Keperawatan/
3. RumahSakit/
4. Subjek/
