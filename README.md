# Projecte XYZ
**Històries del "Equemm"**  
![alt text](/EquemResources/EquemClassicV2Smoll.png)

Benvingut/da a *Projecte XYZ*, un lloc web creat per i per al grup d'amics d' *Equemm*. Aquest projecte és una plataforma per compartir i explorar històries inspirades en les nostres experiències úniques en jocs.  

---

## 🚀 Funcionalitats  
- 🌟 **Visualització de contingut:** Nomes els membres regisrats potden accedir i llegir històries creades pels membres del grup.  
- ✏️ **Creació i gestió de històries:** Els usuaris autenticats poden crear, editar i administrar les seves pròpies històries.  
- 🔒 **Autenticació d'usuaris:** Només els usuaris registrats poden accedir a totes les funcionalitats.  
- 🎭 **Estil narratiu únic:** Les històries són presentades amb un estil immersiu en primera/tercera persona.  

---

## 🎯 Finalitat  
L'objectiu principal de *Projecte XYZ* és:  
1. Preservar moments especials viscuts pel grup.  
2. Fomentar la creativitat a través d'històries úniques.  
3. Compartir experiències de manera interactiva i organitzada.  

---

## 🛠️ Tecnologies utilitzades  
Aquest projecte està desenvolupat amb:  
- **PHP:** Per a la lògica backend i la gestió del servidor.  
- **MySQL:** Per a l'emmagatzematge i gestió de les històries i dades dels usuaris.  
- **HTML5 i CSS3:** Per a la interfície d'usuari i funcionalitats dinàmiques.  
- **Apache2:** Per el desplegament del servidor web.
- **Zero Trust(Cloudfare)** Per gestionar el DNS de la pagina web.  

---

## 👥 Autors del projecte  
Aquest projecte ha estat creat amb dedicació i entusiasme per:  

- **Unai Conus**  
- **Victor Redel**

# Implementacio del Projecte

## VM + Apache
Per implementar el projecte es necessari tenir una maquina virtual amb Debian ( Recomenat: No grafic) o
una VM amb Ubuntu server.

Una vegada creada la VM actualitzem paquets

```
sudo apt update
sudo apt upgrade
```

Una vegada actualitzem els paquets instalem apache2
```
sudo apt install apache2
```
Una vegada instalem apache guardarem tots els fitxers PHP i CSS de la
pagina en /var/www/html

## MySql Server

A continuacio instalarem una BD per gestionar usuaris per els Registers/Logins i guardar
les seves dades per poder gestionarles mes tard en PHP i per gestionar la creacio d'histories.

```
sudo apt install mysql-server
```

Una vegada instalem la base de dades MySql, descarregem els script Sql i els importem al MySql
```
mysql -u root -p < SQL-Script.sql
```

> [!IMPORTANT]
> Modifica la contrasenya del usuari de registre i de login a la teva preferencia




🎉 Gràcies per visitar el nostre projecte!   




*PD: Que pesadilla PHP*
