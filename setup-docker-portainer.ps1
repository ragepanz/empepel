Write-Host "=== Setup Docker Engine di WSL2 + Portainer ===" -ForegroundColor Cyan

Write-Host "`n[1/5] Cek WSL2..." -ForegroundColor Yellow
wsl --status
if ($LASTEXITCODE -ne 0) {
    Write-Host "WSL2 masih belum jalan. Pastikan sudah restart!" -ForegroundColor Red
    exit 1
}

Write-Host "`n[2/5] Install Docker Engine di Ubuntu WSL..." -ForegroundColor Yellow
wsl -d Ubuntu -u root -- bash -c @"
apt-get update -qq
apt-get install -y ca-certificates curl gnupg lsb-release
mkdir -p /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | gpg --dearmor -o /etc/apt/keyrings/docker.gpg
echo \"deb [arch=\$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \$(lsb_release -cs) stable\" | tee /etc/apt/sources.list.d/docker.list > /dev/null
apt-get update -qq
apt-get install -y docker-ce docker-ce-cli containerd.io docker-compose-plugin
"@

Write-Host "`n[3/5] Start Docker daemon..." -ForegroundColor Yellow
wsl -d Ubuntu -u root -- bash -c "service docker start"
Start-Sleep -Seconds 3

Write-Host "`n[4/5] Deploy Portainer..." -ForegroundColor Yellow
wsl -d Ubuntu -u root -- bash -c @"
docker volume create portainer_data
docker run -d -p 8000:8000 -p 9000:9000 --name=portainer --restart=always -v /var/run/docker.sock:/var/run/docker.sock -v portainer_data:/data portainer/portainer-ce:latest
"@

Write-Host "`n[5/5] Verifikasi..." -ForegroundColor Yellow
wsl -d Ubuntu -u root -- docker ps

Write-Host "`n=== SELESAI ===" -ForegroundColor Green
Write-Host "Portainer: http://localhost:9000" -ForegroundColor Cyan
Write-Host "Docker di WSL: wsl -d Ubuntu -u root -- docker ps" -ForegroundColor Cyan
