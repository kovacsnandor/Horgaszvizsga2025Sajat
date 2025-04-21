# Az adatbázis
Az adatbázis a horgászvizsga tananyagát tartalmazó két táblás adatbázis kicsit leegyszerűsített formában.

## Diagram
![Diagram](./database/csv/DiagramHorgaszvizsga.jpg)

## Mezők és jeletésük
A táblák angol elnevezése mellett az egyes és többesszám, a mezők magyar elnevezése mellett, pedig a jobb érthetőség miatt döntöttünk.

### contents tábla (tartalom)
- **id**: Azonosító
- **FejezetCim**: A horgászkönyv adott fejezetének címe (kötelező)
- **KepFile**: Ha a fejezthez van kép, az annak a neve
- **TilalmiIdoszak**: Egy szöveges tartalom, ami hónap:napTól-hónap:napIg formában írja le a tilami időszakok (nem kötelező)
- **MeretKorlat**: Egy hal méret korlátját adja meg (nem kötlező)
- **DarabKorlatos**: 0: nicsn darab korlát, 1: van (nem jötelező)
- **FoghatosagId**: Egy adott halnál megmondja, hogy milyen foghatósági korlátok vonatkoznak rá. (nem kötelező)
**SzovegHtml**: Az adaott fejezethez tartozó html formázott zsöveges tartalom

### catchability_scents (foghatósági szabályok elnevezései)
- **id**: Azonosító
- **Foghatosag**: A foghatósági szabály neve


# Az adatbázis elkészítése
A mysql szerver elindítása után (xampp)
Két módon lehetséges:
vagy
1. A `horgaszvizsga2025 20250421 2327.sql` nevű sql script futtatásával
vagy
2. A laravel elinditása (`php artisan serve`) után
    - Mingráció futtatása: `php artisan migrate`
    - Seeder futtatása: `php artisan db:seed`