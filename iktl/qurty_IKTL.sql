Select a.kode id_wilayah, b.ITH, COALESCE(c.IKH,0) IKH, d.IKTA, e.IPH, COALESCE(IKBA,0) IKBA,  0.23*COALESCE(ITH,0)+0.24*COALESCE(IPH,0)+0.30*COALESCE(IKTA,0)+0.15*COALESCE(IKBA,0)+0.08*COALESCE(IKH,0) IKTL
		From wilayah a
		left join (
			Select a.kode id_wilayah, 100-((84.3-(COALESCE(b.areaFRS,0)/c.area*100))*(50/54.3)) ITH
			From wilayah a
			left join (
			SELECT id_wilayah, COALESCE(SUM( area ),0) areaFRS
			FROM  data_tutupan
			WHERE pl >=2001
			AND pl <=2006
			OR pl = 20041
			OR pl = 20051
			and tahun = 2017
			GROUP BY id_wilayah) b
			on a.kode = b.id_wilayah
			left join (
				Select id_kab, area from kab_area) c
			on a.kode = c.id_kab
			Where length(a.Kode) = 5 and left(a.Kode,2) = 35) b
		on a.kode = b.id_wilayah
		left join (
		SELECT id_wilayah, IKH
		FROM  data_habitat
		WHERE tahun = 2017
		GROUP BY id_wilayah) c
		on a.kode = c.id_wilayah
		left join ( 
			Select a.kode id_wilayah, (1-COALESCE(b.areaC,0)/c.area*0.625)*100 IKTA
			From wilayah a
			left join (
			SELECT id_wilayah, COALESCE(SUM( b1.area*b2.c ),0) areaC
			FROM  data_tutupan b1
			inner join koef_c b2
			on b1.pl = b2.pl
			WHERE tahun = 2017
			GROUP BY id_wilayah) b
			on a.kode = b.id_wilayah
			left join (
				Select id_kab, area from kab_area) c
			on a.kode = c.id_kab
			Where length(a.Kode) = 5 and left(a.Kode,2) = 35
			) d
		on a.kode = d.id_wilayah
		left join (
			Select a.kode id_wilayah, COALESCE(50+(COALESCE(b.Parea,0)-COALESCE(c.Narea,0))*100/d.area,0) IPH
			From wilayah a
			left join (
			SELECT id_prov, SUM( area ) Parea
			FROM  data_performa
			WHERE pl >=2001
			AND pl <=2006
			OR pl = 20041
			OR pl = 20051
			OR ip = 1
			and tahun = 2017
			GROUP BY id_prov) b
			on a.kode = b.id_prov
			left join (
			SELECT id_prov, SUM( area ) Narea
			FROM  data_performa
			WHERE pl >=2001
			AND pl <=2006
			OR pl = 20041
			OR pl = 20051
			OR ip = -1
			AND tahun = 2017
			GROUP BY id_prov) c
			on a.kode = c.id_prov
			left join (
				Select id_kab, area from kab_area) d
			on a.kode = d.id_kab
			Where length(a.Kode) = 5 and left(a.Kode,2) = 35
			) e
		on a.kode = e.id_wilayah
		left join(
			Select a.kode id_wilayah, 100-((100-(b.areaFRS*100/c.areaBuff))*5/7) IKBA
			From wilayah a
			left join (
			SELECT id_wilayah, SUM( area ) areaFRS
			FROM  data_sungai
			WHERE pl >=2001
			AND pl <=2006
			OR pl = 20041
			OR pl = 20051
			AND tahun = 2017
			GROUP BY id_wilayah) b
			on a.kode = b.id_wilayah
			left join (
			SELECT id_wilayah, SUM( area ) areaBuff
			FROM  data_sungai
			WHERE tahun = 2017
			GROUP BY id_wilayah) c
			on a.kode = c.id_wilayah
			Where length(a.Kode) = 5 and left(a.Kode,2) = 35
			) f
		on 	a.kode = f.id_wilayah
		Where length(a.Kode) = 5 and left(a.Kode,2) = 35