# Wake-on-LAN (WOL) Web Application

A simple PHP-based web application to manage devices and send Wake-on-LAN (WOL) magic packets to bring devices online. This tool lets you:
- View the list of devices and their current status (Online/Offline).
- Add new devices through a user-friendly interface.
- Send WOL packets to wake up devices.

---

## **Features**
1. **Device List**: View all devices with their online/offline status.
2. **Wake-on-LAN (WOL)**: Send magic packets to wake up supported devices.
3. **Add Devices**: Add new devices with their name, MAC address, and IP address through a modern modal form.
4. **Ping Status**: Automatically pings devices to check if they are online.

---

## **Requirements**
1. **PHP Version**: 7.4 or later.
2. **Extensions**:
   - `sockets` extension (ensure it is enabled).
3. **Server**:
   - Apache or Nginx.
4. **Operating System**:
   - Linux or Windows (WOL functionality is cross-platform).
5. **Permissions**:
   - Write access to `resources.json` for storing device data.

---

## **Installation**
1. Clone or download this repository into your web server directory (e.g., `/var/www/wol`).
   ```bash
   git clone <repository-url> /var/www/wol
   ```
2. Ensure proper permissions for the `resources.json` file:
   ```bash
   sudo chown www-data:www-data /var/www/wol/resources.json
   sudo chmod 660 /var/www/wol/resources.json
   ```
3. Enable the `sockets` PHP extension:
   ```bash
   sudo apt-get install php-sockets
   ```
   Restart your web server after enabling the extension:
   ```bash
   sudo systemctl restart apache2
   ```

---

## **Usage**
1. Open the web application in your browser:
   ```
   http://<server-ip>/wol
   ```
2. **Add Device**:
   - Click the **"Add Device"** button.
   - Fill in the device name, IP address, and MAC address.
   - Save the details.
3. **Check Device Status**:
   - Devices will be listed with their online/offline status.
   - Online devices will show a green "Online" label.
4. **Wake a Device**:
   - Click the **"Wake"** button next to the offline device.
   - If the device supports WOL, it will turn on.


[img](/images/1.png)
---

## **Configuration**
- **Device Storage**: Devices are stored in the `resources.json` file in the following format:
   ```json
   [
       {
           "name": "Server 1",
           "ip": "192.168.1.10",
           "mac": "AA:BB:CC:DD:EE:FF",
           "last_online": "2024-11-28 15:00:00"
       }
   ]
   ```
   Ensure this file has the correct permissions for the web server to write.

- **Ping Command**:
   The application uses the `ping` command to check device status:
   - Linux: `ping -c 1 -W 1 <ip>`
   - Windows: `ping -n 1 <ip>`

---

## **Known Issues**
1. **Permission Issues**:
   - Ensure `resources.json` has write permissions for the web server user.
2. **Devices Always Offline**:
   - Check if the `ping` command is working from the server manually.
   - Ensure the target device responds to ICMP packets.
3. **WOL Not Working**:
   - Verify the target device supports WOL and has it enabled in BIOS/UEFI.
   - Ensure the correct MAC address is entered.

---

## **Contributing**
Feel free to contribute by:
- Reporting issues.
- Adding new features.
- Improving documentation or UI.

To contribute, fork the repository and submit a pull request with your changes.

---

## **License**
This project is licensed under the MIT License. See the `LICENSE` file for details.

---

## **Credits**
Created by [Ehmad](https://github.com/mrxehmad).

---