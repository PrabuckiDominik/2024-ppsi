# Instalacja Docker'a na Windowsie

1. Uruchom PowerShell'a w trybie administratora

2. Włącz WSL 
```bash
dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart
```

3. Włącz Virtual Machine Platform
```bash
dism.exe /online /enable-feature /featurename:VirtualMachinePlatform /all /norestart
```

4. Ustaw WSL na wersje 2
```bash 
wsl --set-default-version 2
```

5. Zainstaluj WSL z GNU/Linux Ubuntu
```bash
wsl.exe --install
```

6. Stwórz nowego użytkownika (podaj nazwę i hasło)

7. Zaktualizuj GNU/Linux ubuntu
```bash
sudo apt update ; sudo apt upgrade
```

8. Zainstaluj Docker'a
```bash
sudo chmod +x ./install-docker
./install-docker
```

9. Sprawdź, czy wszystko działa
```bash
docker run hello-world
```


10. Sklonuj repozytorium 
```bash
git clone https://github.com/PrabuckiDominik/2024-ppsi.git
```

11. Przejdź do folderu z projektem
```bash
cd 2024-ppsi
```

12. Zminimalizuj terminal i otwórz Visual Studio Code
13. Dodaj rozszerzenia WSL i Docker, autorstwa Microsoft
14. Zamknij Visual Studio Code, wróć do terminala z GNU/Linuksem
15. Uruchom projekt w Visual Studio Code
```bash
code .
```
16. Zamknij terminal
17. Uruchom terminal w Visual Studio Code (`ctrl` + `~`)
18. Zbuduj obrazy Docker'a
```bash
docker compose build  
```
19. Stwórz plik .env i dostosuj jego konfigurację.
```bash
cp .env.example .env
```
20. Uruchom Docker'a
```bash
docker compose up -d
```
21. Po zakończeniu procesu uruchamiania projekt będzie dostępny pod adresem [http://localhost](http://localhost).

22. Konfiguracja GIT'a:
```bash
git config --global user.name "Imie Nazwisko"
git config --global user.email "addres@email.xyz"
sudo apt install gh
gh auth login
```

# Windows Pro
1. Jeżeli używasz Windows w wersji Pro, możesz użyć Docker Desktop. Powinno działać równie wydajnie jak na WSL'ce czy Linuxie.