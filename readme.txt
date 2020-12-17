การติดตั้ง MON-POS

โปรแกรมที่ต้องใช้ในการติดตั้ง
 - XAMMP
 - PHP

ขั้นตอนการติดตั้ง

หากมีไฟล์ project อยู่แล้ว ข้ามข้อที่ 1 

1. git clone https://gitlab.com/slotty.dev/pos.git

2. นำไฟล์โปรเจคไปติดตั้งที่ xampp/htdocs

3. นำไฟล์ thanathi_pos.sql ไปติดตั้งที่ localhost/phpmyadmin

4. กด import ไฟล์ thanthip_pos.sql จาก directory 

5. ตั้งค่า charactor set เป็น UTF-8 หรือ utf8_general_ci

6. กด Go จากนั้นเป็นการเสร็จสิ้นด้านการติดตั้ง

หมายเหตุ

หากติดตั้ง ภายใน เครื่อง MacOS
ต้อง Allow premission โดยใช้คำสั่ง

- chmod 777 {root_directory}/pos/client/assets/images 

video present : https://youtu.be/CF1Lkh3JpuQ
video testing : https://youtu.be/CGzwezAKZJU


