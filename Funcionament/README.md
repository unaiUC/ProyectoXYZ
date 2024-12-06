# Projecte XYZ
**Històries del "Equemm"**  

##  🏗️ Construcio i Funcionament 🚧

## ⚙️ Com funciona la nostra web?
La nostra web funció amb tres contenidors LXC, un de MySQL i un altre de Apache2 + Php això fa que en tinguem la part de Back-end més separada del Front-end y un contenidor LXC amb Cloudflare Zero Trust

![Esquema de como funciona nuestro ejemplo](/EquemResources/esquemaestructura.png)

 Tot està muntat sobre un Proxmox que fa de hyper-visor i tenim separat en tres parts

## 📚 My SQL
Aquest és la nostra base de dades SQL important destacar que no fem cap relació, ja que tot s'encarrega la part de PHP de fer les relacions per a hora recursos a la base de dades, ja que en aquest cas no tenim la necessitat de fer-ho més complicat, tot així es podria fer, però com la pàgina no és molt visitada no és necessari, i també el tràfic només és text pla no és necessari assigna-li molts recursos.

## 🛡️ Zero Trust (Cloudflare)
Aquest contenidor s'encarrega de la gestió del domini, el SSL i Proxy, tot això està documentant en la seva pàgina, però resumidament aquest servei fa una "VPN" des del teu domicili/proveïdor fins als servidors de Cloudflare canviant la teva IP a un altre, encriptant tot el tràfic i controlant l'accés, en si com només ha d'encaminar el tràfic podem assignar-li recursos molt baixos.

>Aquest dos ultims fet amb l'ajuda de Proxmox Helper Scripts

## 🌐 Apache2 + PHP
Aquest contenidor basat en Debian Bookworm és el *PowerHouse * de la nostra estructura, tots els processos es fa en aquest contenidor, principalment es treballa molt les consultés SQL i els scripts de PHP per això és el que més vCPU té i memòria RAM.

>Aquest últim fet a mà amb la plantilla de Debian 12
