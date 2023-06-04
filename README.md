# Bulletin Monitor scraper proto

Ez a repo a K-Monitor Bulletin Monitor (BM) projektjéhez fejlesztett minta scrapert tartalmazza. A program scrapelést nem végez, hanem példát ad a BM
backendjével való kommunikációra.
Valamilyen webszerverre van szükség a futtatásához, mivel így használható bemutató célra is.

## Konfigurálás

Másold a config.example.php-t config.php néven.

**'backendUrl'** - az adott BM backend URL-je  
**'uuid'** - eventgenerator uuid, a BM backend adja

## Használat

A különböző műveleteket GET kérésekkel lehet elérni, a művelet neve az 'r' URL paraméterben legyen.

### Műveletek

- **getevents**: lekérdezi a figyelendő eseményeket BM backendtől. Eredménye:
  ```
  {
  data: [
      {
          id: "99498684-5545-4413-bfd6-b1281a9d9838",
          eventgenerator_id: "99492276-d0f2-4097-9688-8ab7dd04322a",
          parameters: "belügyminiszter",
          active: 1
      },
      {
          id: "99499202-f3b9-4a10-86f4-0bf9e62a0b60",
          eventgenerator_id: "99492276-d0f2-4097-9688-8ab7dd04322a",
          parameters: "tesztelek",
          active: 1
      },
      {
          id: "994d5683-d138-4a66-826a-3a56c5b5a37c",
          eventgenerator_id: "99492276-d0f2-4097-9688-8ab7dd04322a",
          parameters: "wdf",
          active: 1
      },
      {
          id: "994d65d2-1d19-43e4-a08a-e88f6955d5a4",
          eventgenerator_id: "99492276-d0f2-4097-9688-8ab7dd04322a",
          parameters: "33",
          active: 1
      }
      ]
  }
  ```
  *id*: az esemény azonosítója  
  *eventgenerator_id*: az eventgenerator azonosítója, megegyezik a config.php-ban tárolt uuid-del  
  *parameters*: ha a scrapered egy kereső, akkor ez a keresett kifejezés  
  *active*: mindig 1, csak az aktív eseményeket kapod meg


- **notifyevent**: a fenti lekérdezés eredményéből válassz egyet és add meg az 'u' URL paraméterben. A program meghívja BM backend megfelelő végpontját
  felparaméterezve.

