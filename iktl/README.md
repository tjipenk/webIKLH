# Aplikasi Pengolahan Data IKTL
##

Aplikasi Pengolahan data vector Tutupan lahan 

1. Install osgeo
> sudo add-apt-repository -y ppa:ubuntugis/ppa \n
> sudo apt update \n
> sudo apt upgrade # if you already have gdal 1.11 installed \n
> sudo apt install gdal-bin python-gdal python3-gdal \n

2. Script Select file by attribute and save to file.
> ogr2ogr -f "ESRI Shapefile" -where "PL00_ID >= 2001 and PL00_ID <= 2006 or PL00_ID = 20041 or PL00_ID = 20051" Frs2000.shp PL2000.shp

#select and reprojection
> ogr2ogr -f "ESRI Shapefile" -where "pl16_id >= 2001 and pl16_id <= 2006 or pl16_id = 20041 or pl16_id = 20051" -t_srs EPSG:32749 ./shp/Frs2016UTM.shp ./shp/PL_2016.shp

3. Intersect (14)
> saga_cmd shapes_polygons 14 -A Frs2000.shp -B admin.shp -RESULT Frs2000adm.shp
 
4. Reproyeksi
> ogr2ogr -f "ESRI Shapefile" -where "pl16_id >= 2001 and pl16_id <= 2006 or pl16_id = 20041 or pl16_id = 20051" -t_srs EPSG:32749 ./shp/Frs2016UTM.shp ./shp/PL_2016.shp


5. Calculate geometry
> saga_cmd shapes_polygons 2 -POLYGONS ./shp/admin2017.shp -OUTPUT ./shp/admin2017_area.shp 
> saga_cmd shapes_polygons 2 -POLYGONS ./shp/Frs2016admUTM.shp -OUTPUT ./shp/Frs2016admUTM_area.shp


6. Import dbf to mysql admin area
> import_dbf_mysql.py

7. calculate admin area
> SELECT id_prov, prov, sum( area_ha ) AS area_ha, tahun FROM `admin_area` 
> GROUP BY id_prov, prov, tahun

#skema aplikasi perhitungan IKTL
>> Admin >> ./shp/admin.shp (UTM)
>> PL >> Input>> ./$tahun/input.shp (WGS84;id_pl)
>> Intersect >> output >>./$tahun/output.shp (UTM;id_prov,id_pl,AREA)
>> Import DBF to mysql >>
ITH >> Calculate FRS (id_pl:2001->2006,20041,20051)
IKT >> Calculate each id_pl * koef_C 



