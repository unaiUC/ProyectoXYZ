## 🗄️ Scripts SQL  

En aquesta secció es proporcionen els scripts necessaris per implementar tota la base de dades, incloent-hi la creació de taules, usuaris i altres elements requerits per al correcte funcionament del projecte. Els scripts estan dissenyats per funcionar en una base de dades MySQL.  

### 📂 Contingut dels scripts  
1. **`DB.sql`:**  
   - Crea la base de dades principal.  
   - Defineix la configuració inicial.  

2. **`tablas.sql`:**  
   - Inclou les sentències per crear totes les taules necessàries, com ara:  
     - Històries  
     - Usuaris  
     - Altres relacions requerides.  

3. **`usuarios.sql`:**  
   - Crea els usuaris necessaris per accedir a la base de dades.  
   - Assigna permisos adequats per a cada usuari.  

### ⚙️ Com utilitzar els scripts  
Segueix aquests passos per implementar la base de dades:  

1. **Obrir el terminal o una eina de gestió MySQL:**  
   Pots utilitzar eines com **phpMyAdmin**, **MySQL Workbench** o la línia de comandes de MySQL.  

2. **Executar els scripts en ordre:**  
   - Primer, executa `DB.sql` per crear la base de dades.  
   - Seguidament, executa `tablas.sql` per generar les taules.  
   - Finalment, executa `usuarios.sql` per crear els usuaris i assignar permisos.  

   Exemple d'execució des de la línia de comandes:  
   ```bash
   mysql -u root -p < DB.sql
   mysql -u root -p < tablas.sql
   mysql -u root -p < usuarios.sql
