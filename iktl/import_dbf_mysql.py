import MySQLdb
from dbfpy import dbf

# -- initialize --
dbm = MySQLdb.connect(host="localhost", user="root", passwd="toor", db="iklh")
cur = dbm.cursor()
db = dbf.Dbf("./shp/admin2017_area.dbf")
items = []
i = 0
tahun = 2017

for rec in db:
    rec['NAME_1'] = str(rec['NAME_1'])
    rec['id_prov'] = str(rec['id_prov'])
    AREA = float(rec['AREA']/10000)
    try:
        cur.execute("""INSERT INTO admin_area (id_prov, prov, area_ha, tahun) VALUES (%s, %s, %s, %s)""", (rec['id_prov'], rec['NAME_1'], AREA, tahun))
        dbm.commit()
    except Exception, e:
        dbm.rollback()
        print e

print "successfull add items"
print "successfull"
dbm.close()
