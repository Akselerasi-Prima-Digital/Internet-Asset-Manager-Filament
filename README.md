# Internet Asset Manager

**Internet Asset Manager** is a web-based system to manage your **domains, hosting, VPS, providers, and registrars** in one centralized dashboard.  
It helps you track service expiry dates, renewal costs, and monitor the overall status of your internet infrastructure.

---

## ✨ Features

- 📊 **Dashboard Overview** with statistics, charts, and renewal cost estimation  
- 🌐 **Domain Management** with expiry tracking and registrar integration  
- 🖥️ **Hosting & VPS Management** with provider assignment and IP details  
- ⏰ **Expiry Monitoring** – Active, Expiring (30 days), Expired status  
- 💰 **Renewal Cost Tracking** for domains, hosting, and VPS  
- 🏢 **Provider & Registrar Management**  
- 🔍 **Searchable & Filterable Tables**  
- 📑 **Export Reports** (planned)  

---

## 🛠️ Tech Stack

- [Laravel 12](https://laravel.com/) – PHP framework  
- [FilamentPHP](https://filamentphp.com/) – Admin panel & dashboard  
- [MySQL/MariaDB](https://www.mysql.com/) – Database 

---

## 📦 Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Akselerasi-Prima-Digital/Internet-Asset-Manager-Filament.git
   cd Internet-Asset-Manager-Filament
   ```

2. Install dependencies:

   ```bash
   composer install
   npm install && npm run build
   ```

3. Setup environment:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure database in `.env` and run migrations:

   ```bash
   php artisan migrate --seed
   ```

5. Start the server:

   ```bash
   php artisan serve
   ```

---

## 🚀 Usage

* Login to the Filament dashboard
* Manage **Domains, Hosting, VPS, Providers, and Registrars**
* View dashboard to monitor expiring services
* Track renewal costs and prepare budgets

---

## 🤝 Contributing

Contributions are welcome! Please fork the repo and submit a pull request.
For major changes, open an issue first to discuss what you’d like to change.

---

## 📄 License

This project is licensed under the MIT License – see the [LICENSE](LICENSE) file for details.
