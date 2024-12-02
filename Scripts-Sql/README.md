## 🗄️ Scripts SQL  

En aquesta secció es proporciona el script necessaris per implementar tota la base de dades, incloent-hi la creació de taules, usuaris i altres elements requerits per al correcte funcionament del projecte. El script estan dissenyat per funcionar en una base de dades MySQL.  

### 📂 Contingut dels script
1. **`BD`:**  
   - Crea la base de dades principal.  
   - Defineix la configuració inicial.  

2. **`Taules`:**  
   - Inclou les sentències per crear totes les taules i columnes necessàries:  
     - Històries
       -ID Historia
       -Titulo
       -Texto
       -Organizacion
       -Classification
       -Fecha
       -Usuario  
     - Usuaris
       -ID Usuario
       -Nombre
       -Contraseña 

3. **`Usuaris`:**  
   - Crea els usuaris necessaris per accedir i modificar la base de dades
     -addhistory
     -login
     -register
     
4. **`Permisos`:**
   - Permisos de *Select* al usuari de Login que es fara servir per consultar
   - Permisos de *Insert* y *Update* al usuari de Register que es fara per afegir usuaris a la pagina web. 

### ⚙️ Com utilitzar els scripts  
Segueix aquests passos per implementar la base de dades:  

1. **Obrir el terminal o una eina de gestió MySQL:**
   Des de la fundació Equemm sempre recomanem Visual Studio o similars per scripting.
   Tambe pots utilitzar eines com **phpMyAdmin**, **MySQL Workbench** o la línia de comandes de MySQL.  

3. **Executar els script:**  
   - Executa `SQL-Script.sql` per crear la base de dades.
   ⚠️És possible que necessites adaptar el script a les necessitats del teu *hosting*, pro a nosaltres amb Proxmox VE fent ús de MySQL de PVE Helper Scripts + Debian 12 LXC        ens ha funcionat.⚠️
     
   Exemple d'execució des de la línia de comandes:  
   ```bash
   mysql -u root -p < SQL-Script.sql
   ```
