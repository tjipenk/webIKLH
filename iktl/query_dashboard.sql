SELECT n.kode, a.iktl iktl, b.iktl iktl1, c.iktl iktl2
FROM wilayah n
LEFT JOIN (SELECT id_prov, iktl
            FROM rekap WHERE tahun = 2018) a on n.kode = a.id_prov
LEFT JOIN (SELECT id_prov, iktl
            FROM rekap WHERE tahun = 2017) b on n.kode = b.id_prov
LEFT JOIN (SELECT id_prov, iktl
            FROM rekap WHERE tahun = 2016) c on n.kode = c.id_prov
WHERE LENGTH(kode) = 2
