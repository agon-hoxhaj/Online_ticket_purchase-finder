# Sistemi i Biletave për Evente

Ky projekt është një aplikacion në PHP për menaxhimin e eventeve dhe blerjen e biletave, duke përdorur programim të orientuar në objekte dhe ruajtje të të dhënave në file.

## Përshkrimi i Klasave

### Event
Përfaqëson një event.

Atributet:
- event_name
- event_type
- description
- location
- date
- time
- price

Metodat:
- __construct(...) → inicializon të dhënat e eventit

---

### Ticket
Përfaqëson një biletë të blerë.

Atributet:
- event_name (publik)
- ticket_info (privat)

Metodat:
- __construct($event_name, $ticket_info) → inicializon biletën
- getTicketinfo() → kthen informacionin e biletës
- setTicketinfo($ticket_info) → përditëson informacionin e biletës

---

### User
Menaxhon përdoruesit dhe biletat e tyre.

Atributet:
- id
- full_name
- username
- email
- password (i enkriptuar)
- country
- user_type
- tickets (array me objekte Ticket)
- file (rruga e Users.txt)

Metodat:
- register(...) → regjistron përdorues dhe e ruan në file
- login($email, $password) → verifikon kredencialet dhe krijon session
- add_ticket(Ticket $ticket) → shton një biletë
- get_tickets() → kthen biletat e përdoruesit
- get_UserDetails() → kthen të dhënat bazë të përdoruesit
- get_all_users() → kthen të gjithë përdoruesit nga file

---

## Shënime

- Të dhënat ruhen në file (.txt), jo në databazë
- Autentikimi bëhet me session
- Password-at ruhen të enkriptuara
- Biletat ruhen përkohësisht në session gjatë ekzekutimit