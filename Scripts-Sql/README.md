## 🗄️ Scripts SQL  

En aquesta secció es proporciona el script necessaris per implementar tota la base de dades, incloent-hi la creació de taules, usuaris i altres elements requerits per al correcte funcionament del projecte. El script estan dissenyat per funcionar en una base de dades MySQL.  

### 📂 Contingut dels script
1. **`BD`:**  
   - Crea la base de dades principal.  
   - Defineix la configuració inicial.  

2. **`Taules`:**  
   - Inclou les sentències per crear totes les taules i columnes necessàries:  
     - Històries  
     - Usuaris  

3. **`Usuaris`:**  
   - Crea els usuaris necessaris per accedir i modificar la base de dades
     
4. **`Permisos`:**
   - Permisos de Select al usuari de Login que es fara servir per consultar
   - Permisos de Insert al usuari de Register que es fara per afegir usuaris a la pagina web. 

### ⚙️ Com utilitzar els scripts  
Segueix aquests passos per implementar la base de dades:  

1. **Obrir el terminal o una eina de gestió MySQL:**  
   Pots utilitzar eines com **phpMyAdmin**, **MySQL Workbench** o la línia de comandes de MySQL.  

2. **Executar els script:**  
   - Executa `SQL-Script.sql` per crear la base de dades.
     
   Exemple d'execució des de la línia de comandes:  
   ```bash
   mysql -u root -p < SQL-Script.sql
   ```
