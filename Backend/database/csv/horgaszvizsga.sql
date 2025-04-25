SELECT * FROM contents;
SELECT * FROM catchability_scents;


# SQL lekérdezések a feladathoz

# horgaszvizsgaTananyag
SELECT co.*, ca.Foghatosag FROM contents co
  LEFT JOIN catchability_scents ca on ca.id = co.FoghatosagId;

# halkartyak
SELECT co.*, ca.Foghatosag FROM contents co
  LEFT JOIN catchability_scents ca on ca.id = co.FoghatosagId
  WHERE co.KepFile IS NOT NULL;

# halkartyaById/id
SELECT * FROM contents co
  LEFT JOIN catchability_scents ca on ca.id = co.FoghatosagId
  WHERE co.id = 1;

# halkartyakGyakorlo
SELECT id, FejezetCim, KepFile FROM contents
  WHERE KepFile IS NOT NULL;

SELECT * FROM contents
  where FejezetCim = 'Csuka';

