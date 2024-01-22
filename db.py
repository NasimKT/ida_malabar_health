import mysql.connector
import json

# JSON data as a list of dictionaries
clinic_data = [
    {
            "name": "SANTHI DENTAL CLINIC",
            "imageSrc": "img/2023-03-14.jpg",
            "socialLinks": ["https://maps.app.goo.gl/7iCAfHXarQYpApy2A"],
            "location": "ERANHIKKAL",
            "knowmorelink": "https://www.google.com/search?q=SANTHI+DENTAL+CLINIC%2CERANHIKKAL+P.O%2CKOZHIKODE+-673303&oq=SANTHI+DENTAL+CLINIC%2CERANHIKKAL+P.O%2CKOZHIKODE+-673303&gs_lcrp=EgZjaHJvbWUyBggAEEUYOdIBBzgyN2owajeoAgCwAgA&sourceid=chrome&ie=UTF-8#ip=1",
            "hasWheelchairAccess": 1,
            "hasRampAccess": 1,
            "hasLiftAccess": 0
    },    
    {
        "name": "RESIDENTIAL DENTAL PRACTICE",
        "imageSrc": "img/tmp_pic_1695779139445 - santhosh VC.png",
        "socialLinks": ["https://maps.app.goo.gl/M8efbJFPTiqmdLNq9"],
        "location": "MALAPARAMBA",
        "knowmorelink": "https://www.google.com/search?q=dr+santhosh+v+c&sca_esv=582496584&sxsrf=AM9HkKk8AySKd9zlYWHtvRvwhKLJprgLag%3A1700018143013&ei=3zdUZaQ4lKrj4Q-G2buwDg&ved=0ahUKEwjko5qMhcWCAxUU1TgGHYbsDuYQ4dUDCBA&uact=5&oq=dr+santhosh+v+c&gs_lp=Egxnd3Mtd2l6LXNlcnAiD2RyIHNhbnRob3NoIHYgYzIEECMYJ0jZKVDAC1jRJHACeAGQAQCYAdACoAH5HaoBCDAuNC4xMS4xuAEDyAEA-AEBqAIUwgIHECMY6gIYJ8ICFhAuGAMYjwEY5QIY6gIYtAIYjAPYAQHCAhYQABgDGI8BGOUCGOoCGLQCGIwD2AEBwgIOEAAYigUYsQMYgwEYkQLCAggQABiKBRiRAsICCxAAGIAEGLEDGIMBwgIFEAAYgATCAggQLhiABBixA8ICERAuGIAEGLEDGIMBGMcBGNEDwgIFEC4YgATCAgsQABiKBRixAxiDAcICBxAuGIoFGEPCAgcQABiKBRhDwgIOEC4YgAQYsQMYxwEY0QPCAgoQABiKBRixAxhDwgIIEAAYgAQYsQPCAgoQLhiKBRixAxhDwgIdEC4YgAQYsQMYxwEY0QMYlwUY3AQY3gQY4ATYAQLCAhAQLhiKBRixAxiDARjUAhhDwgILEC4YgAQYsQMYgwHCAhEQLhiKBRixAxiDARjHARivAcICCxAuGIAEGMcBGK8BwgILEC4YrwEYxwEYgATCAgYQABgWGB7iAwQYACBBiAYBugYGCAEQARgLugYGCAIQARgU&sclient=gws-wiz-serp",
        "hasWheelchairAccess": 0,
        "hasRampAccess": 0,
        "hasLiftAccess": 0
    },
    {
        "name": "ADHITHI POLY CLINIC",
        "imageSrc": "img/IMG-20230706-WA0025 - Athira. m.p.jpg",
        "socialLinks": ["https://maps.app.goo.gl/M8efbJFPTiqmdLNq9"],
        "location": "VATTAKINAR",
        "knowmorelink": "https://www.google.com/search?q=ADHITHI+POLY+CLINIC%2C+NEAR+MEENCHANDA+RAILWAY+GATE+%2C+BELOW+FLY+OVER%2C+VATTAKINAR&oq=ADHITHI+POLY+CLINIC%2C+NEAR+MEENCHANDA+RAILWAY+GATE+%2C+BELOW+FLY+OVER%2C+VATTAKINAR&gs_lcrp=EgZjaHJvbWUyBggAEEUYOdIBCTExOTdqMGoxNagCALACAA&sourceid=chrome&ie=UTF-8",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    },
    {
        "name": "DR SUDHEER'S DENTACARE DENTAL CLINIC",
        "imageSrc": "img/afe8e9b0-83af-4503-b2d2-23da6ae33eee - rubeena shahir.jpeg",
        "socialLinks": ["https://maps.app.goo.gl/zGu7gaLM9bDrWoq96"],
        "location": "PAYYOLI",
        "knowmorelink": "https://dr-sudheers-dentacare-dental-clinic.business.site/?utm_source=gmb&utm_medium=referral",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    },
    {
        "name": "DR HARISH KUMAR V V",
        "imageSrc": "img/ded.webp",
        "socialLinks": ["#"],
        "location": "KUTHIRAVATTOM",
        "knowmorelink": "dentista-master/index1.html",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    },
    {
        "name": "KARTHIKA DENTAL CLINIC & SPECIALTY CENTRE",
        "imageSrc": "img/IMG-20231011-WA0180 - Madhavankutty Bharathan.jpg",
        "socialLinks": ["https://maps.app.goo.gl/QfYxXF4VqiHXF7MF6"],
        "location": "THAMARASSERY",
        "knowmorelink": "https://www.google.com/search?q=KARTHIKA+DENTAL+CLINIC+%26+SPECIALTY+CENTRE%2C+FATHIMA+SHOPPING+COMPLEX%2C+THAMARASSERY%0D%0A&sca_esv=582496584&sxsrf=AM9HkKlCbXaTawNklRd5VEq0wD1lZUEHnQ%3A1700017449450&ei=KTVUZeuMG6Gb4-EPvP6_sAM&ved=0ahUKEwirxb7BgsWCAxWhzTgGHTz_DzYQ4dUDCBA&uact=5&oq=KARTHIKA+DENTAL+CLINIC+%26+SPECIALTY+CENTRE%2C+FATHIMA+SHOPPING+COMPLEX%2C+THAMARASSERY%0D%0A&gs_lp=Egxnd3Mtd2l6LXNlcnAiUktBUlRISUtBIERFTlRBTCBDTElOSUMgRlJBTkNJUyBST0FEMgcQIRigARgKMgcQIRigARgKSM5AUO4FWO0-cAF4AJABAJgB1QOgAcpMqgEKMC4yLjE4LjYuN7gBA8gBAPgBAagCFMICBxAjGOoCGCfCAhYQABgDGI8BGOUCGOoCGLQCGIwD2AEBwgIEECMYJ8ICBxAjGIoFGCfCAhQQLhiKBRixAxiDARjHARjRAxiRAsICCBAAGIoFGJECwgILEC4YgAQYsQMYgwHCAgsQABiABBixAxiDAcICBRAuGIAEwgIHEC4YigUYQ8ICBxAAGIoFGEPCAg0QLhiKBRjHARivARhDwgINEC4YigUYxwEY0QMYQ8ICDhAAGIoFGLEDGIMBGJECwgILEC4YgwEYsQMYgATCAggQLhixAxiABMICCBAAGIAEGLEDwgILEC4YgAQYxwEYrwHCAgoQABiKBRixAxhDwgINEC4YrwEYxwEYigUYQxiXBRjcBBjeBBjgBNgBAsICDhAuGK8BGMcBGIAEGJgFwgIQEC4YgAQYFBiHAhjHARivAcICBxAuGIAEGArCAhoQLhiABBjHARivARiXBRjcBBjeBBjgBNgBAsICHRAuGK8BGMcBGIAEGJgFGJcFGNwEGN4EGOAE2AECwgIIEAAYFhgeGArCAgYQABgWGB7CAgsQABgWGB4Y8QQYCsICCBAAGIoFGIYDwgIHEAAYDRiABMICCRAAGA0YgAQYCsICDRAuGA0YgAQYxwEYrwHCAgYQABgeGA3CAggQABgIGB4YDcICChAAGAgYHhgNGArCAgoQLhgIGB4YDRgKwgIcEC4YDRiABBjHARivARiXBRjcBBjeBBjgBNgBAsICBBAhGBXiAwQYACBBiAYBugYGCAEQARgLugYGCAIQARgU&sclient=gws-wiz-serp",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    },{
        "name": "AL SANAH DENTAL SPECIALITY CENTRE",
        "imageSrc": "img/PHOTO-2023-10-14-11-36-54 2 - Dr.Hafsath Abdurehiman.jpg",
        "socialLinks": ["https://maps.app.goo.gl/sTaA4r8civq2PvXn8"],
        "location": "FRANCIS ROAD",
        "knowmorelink": "https://www.google.com/search?q=AL+SANAH+DENTAL+CLINIC+FRANCIS+ROAD&sca_esv=582496584&sxsrf=AM9HkKmxQUPJdGIV8UiDr10tu6F0E4n16w%3A1700017465819&ei=OTVUZcHDMd3G4-EPrvqcyAk&ved=0ahUKEwiBxKXJgsWCAxVd4zgGHS49B5kQ4dUDCBA&uact=5&oq=AL+SANAH+DENTAL+CLINIC+FRANCIS+ROAD&gs_lp=Egxnd3Mtd2l6LXNlcnAiI0FMIFNBTkFIIERFTlRBTCBDTElOSUMgRlJBTkNJUyBST0FEMgcQIRigARgKMgcQIRigARgKSM5AUO4FWO0-cAF4AJABAJgB1QOgAcpMqgEKMC4yLjE4LjYuN7gBA8gBAPgBAagCFMICBxAjGOoCGCfCAhYQABgDGI8BGOUCGOoCGLQCGIwD2AEBwgIEECMYJ8ICBxAjGIoFGCfCAhQQLhiKBRixAxiDARjHARjRAxiRAsICCBAAGIoFGJECwgILEC4YgAQYsQMYgwHCAgsQABiABBixAxiDAcICBRAuGIAEwgIHEC4YigUYQ8ICBxAAGIoFGEPCAg0QLhiKBRjHARivARhDwgINEC4YigUYxwEY0QMYQ8ICDhAAGIoFGLEDGIMBGJECwgILEC4YgwEYsQMYgATCAggQLhixAxiABMICCBAAGIAEGLEDwgILEC4YgAQYxwEYrwHCAgoQABiKBRixAxhDwgINEC4YrwEYxwEYigUYQxiXBRjcBBjeBBjgBNgBAsICDhAuGK8BGMcBGIAEGJgFwgIQEC4YgAQYFBiHAhjHARivAcICBxAuGIAEGArCAhoQLhiABBjHARivARiXBRjcBBjeBBjgBNgBAsICHRAuGK8BGMcBGIAEGJgFGJcFGNwEGN4EGOAE2AECwgIIEAAYFhgeGArCAgYQABgWGB7CAgsQABgWGB4Y8QQYCsICCBAAGIoFGIYDwgIHEAAYDRiABMICCRAAGA0YgAQYCsICDRAuGA0YgAQYxwEYrwHCAgYQABgeGA3CAggQABgIGB4YDcICChAAGAgYHhgNGArCAgoQLhgIGB4YDRgKwgIcEC4YDRiABBjHARivARiXBRjcBBjeBBjgBNgBAsICBBAhGBXiAwQYACBBiAYBugYGCAEQARgLugYGCAIQARgU&sclient=gws-wiz-serp",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 0,
        "hasLiftAccess": 0
    },
    {
        "name": "WHITE ROOTS DENTAL CLINIC, JP BUILDING",
        "imageSrc": "img/PXL_20231014_062231303 - Sarath Jayaprakash.jpg",
        "socialLinks": ["https://whiterootsdental.business.site/"],
        "location": "ERANJIPALAM",
        "knowmorelink": "https://whiterootsdental.business.site/",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    },
    {
        "name": "THIRUVANNUR DENTAL CLINIC",
        "imageSrc": "img/IMG_20230928_195613 - bijoy Das.jpg",
        "socialLinks": ["https://maps.app.goo.gl/drdUnMau4JjBKKqD8"],
        "location": "THIRUVANNUR",
        "knowmorelink": "https://www.google.com/search?q=THIRUVANNUR+DENTAL+CLINIC&oq=THIRUVANNUR+DEN&gs_lcrp=EgZjaHJvbWUqCwgAEEUYJxg7GIoFMgsIABBFGCcYOxiKBTIGCAEQRRg5Mg0IAhAuGK8BGMcBGIAEMgcIAxAAGIAEMggIBBAAGBYYHjIKCAUQABiGAxiKBTIKCAYQABiGAxiKBTIGCAcQRRg8qAIAsAIA&sourceid=chrome&ie=UTF-8",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 0,
        "hasLiftAccess": 0
    },
    {
        "name": "PEARL DENTAL CLINIC",
        "imageSrc": "img/Screenshot_2023-10-16-01-04-55-916_com.android.chrome-edit - Sooraj P V.jpg",
        "socialLinks": ["https://maps.app.goo.gl/zYNoZKBeRbzurqmV8"],
        "location": "RAMANATTUKARA",
        "knowmorelink": "https://pearlmultispecialitydentalclinic.dialndial.com/",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 0,
        "hasLiftAccess": 0
    },
    {
        "name": "D WHITE DENTAL CARE",
        "imageSrc": "img/IMG_7075 - Anil Jacob.jpeg",
        "socialLinks": ["https://maps.app.goo.gl/SbuqfGEvNCfW2KkU9"],
        "location": "KOORACHUND",
        "knowmorelink": "https://www.justdial.com/Kozhikode/D-White-Dental-Clinic-Koorachundu/0495PX495-X495-181218085114-S9M7_BZDET",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    },
    {
        "name": "DENTACARE DENTAL CLINIC",
        "imageSrc": "img/2017-10-04.jpg",
        "socialLinks": ["https://maps.app.goo.gl/zHiocpsjYruaqbQh8"],
        "location": "THAMARASSERY",
        "knowmorelink": "https://www.google.com/search?q=DR+JOSEPH+C+C+%2C+DENTA+CARE+DENTAL+CLINIC+THAMARASSERY&sca_esv=582496584&sxsrf=AM9HkKlkfbHzLe5pexTZB6DkQpbPMf4sOQ%3A1700017741322&ei=TTZUZbamE_CF4-EPneq1qAU&ved=0ahUKEwj2gNXMg8WCAxXwwjgGHR11DVUQ4dUDCBA&uact=5&oq=DR+JOSEPH+C+C+%2C+DENTA+CARE+DENTAL+CLINIC+THAMARASSERY&gs_lp=Egxnd3Mtd2l6LXNlcnAiNURSIEpPU0VQSCBDIEMgLCBERU5UQSBDQVJFIERFTlRBTCBDTElOSUMgVEhBTUFSQVNTRVJZMgcQIRigARgKMgcQIRigARgKMgcQIRigARgKMgcQIRigARgKSJkvUOsCWJQscAF4AJABAZgB7QWgAZJOqgEMMi0xMC42LjMuNC4yuAEDyAEA-AEBwgIIEAAYogQYsAPCAgcQIxiwAhgnwgINEC4YDRiABBjHARivAcICBhAAGB4YDcICBRAhGKABwgIEECEYFcICCBAhGBYYHhgdwgIFECEYkgPiAwQYASBBiAYBkAYE&sclient=gws-wiz-serp",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    },
    {
        "name": "SONY DENTAL CLINIC",
        "imageSrc": "img/sony-dental-clinic-vengery-kozhikode-clinics-8gyfbcgtt2.avif",
        "socialLinks": ["https://maps.app.goo.gl/ceH3aWq57nB4kenc6"],
        "location": "THADAMBATTU THAZHAM",
        "knowmorelink": "https://www.google.com/search?q=DR+ARUN+GEORGE+SONY+DENTAL+CLINIC&sca_esv=582496584&sxsrf=AM9HkKlPG4BMi4ZSzmLxY8mxmGUNItFM5A%3A1700017773944&ei=bTZUZaGTOeDF4-EP8ouQSA&ved=0ahUKEwjh_Zvcg8WCAxXg4jgGHfIFBAkQ4dUDCBA&uact=5&oq=DR+ARUN+GEORGE+SONY+DENTAL+CLINIC&gs_lp=Egxnd3Mtd2l6LXNlcnAiIURSIEFSVU4gR0VPUkdFIFNPTlkgREVOVEFMIENMSU5JQyBQRVJBTUJSQTILEC4YgAQYxwEYrwEyBhAAGBYYHjIaEC4YgAQYxwEYrwEYlwUY3AQY3gQY4ATYAQJIijxQyAZY5DRwAXgBkAEAmAGdBKABlkWqAQswLjMuOC43LjYuMrgBA8gBAPgBAagCFMICBxAjGOoCGCfCAhYQLhgDGI8BGOUCGOoCGLQCGIwD2AEBwgIWEAAYAxiPARjlAhjqAhi0AhiMA9gBAcICBxAjGIoFGCfCAgQQIxgnwgIIEAAYigUYkQLCAgsQABiABBixAxiDAcICBxAuGIoFGEPCAgcQABiKBRhDwgIIEAAYgAQYsQPCAgUQABiABMICCxAAGIoFGLEDGJECwgINEC4YigUYsQMYgwEYQ8ICChAuGIoFGLEDGEPCAgoQABiKBRixAxhDwgIOEC4YigUYxwEYrwEYkQLCAhAQLhiABBgUGIcCGMcBGK8BwgIIEC4YsQMYgATCAhAQLhgUGK8BGMcBGIcCGIAEwgIFEC4YgATCAh8QLhgUGK8BGMcBGIcCGIAEGJcFGNwEGN4EGOAE2AECwgIHEAAYgAQYCsICCBAAGIoFGIYDwgIfEC4YgAQYFBiHAhjHARivARiXBRjcBBjeBBjgBNgBAuIDBBgAIEGIBgG6BgYIARABGAu6BgYIAhABGBQ&sclient=gws-wiz-serp",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    },
    {
        "name": "PROMISE DENTAL CLINIC",
        "imageSrc": "img/IMG_20190516_140355048.jpg",
        "socialLinks": ["https://maps.app.goo.gl/19xVXS3CzywMic948"],
        "location": "PERAMBRA",
        "knowmorelink": "https://www.google.com/search?q=PROMISE+DENTAL+CLINIC+PERAMBRA&sca_esv=582496584&sxsrf=AM9HkKk2rquborP7AD4CKQBAzS3kwsvZNw%3A1700017853920&ei=vTZUZaDwN8Gd4-EPjey1mAM&ved=0ahUKEwjgwq2ChMWCAxXBzjgGHQ12DTMQ4dUDCBA&uact=5&oq=PROMISE+DENTAL+CLINIC+PERAMBRA&gs_lp=Egxnd3Mtd2l6LXNlcnAiHlBST01JU0UgREVOVEFMIENMSU5JQyBQRVJBTUJSQTILEC4YgAQYxwEYrwEyBhAAGBYYHjIaEC4YgAQYxwEYrwEYlwUY3AQY3gQY4ATYAQJIijxQyAZY5DRwAXgBkAEAmAGdBKABlkWqAQswLjMuOC43LjYuMrgBA8gBAPgBAagCFMICBxAjGOoCGCfCAhYQLhgDGI8BGOUCGOoCGLQCGIwD2AEBwgIWEAAYAxiPARjlAhjqAhi0AhiMA9gBAcICBxAjGIoFGCfCAgQQIxgnwgIIEAAYigUYkQLCAgsQABiABBixAxiDAcICBxAuGIoFGEPCAgcQABiKBRhDwgIIEAAYgAQYsQPCAgUQABiABMICCxAAGIoFGLEDGJECwgINEC4YigUYsQMYgwEYQ8ICChAuGIoFGLEDGEPCAgoQABiKBRixAxhDwgIOEC4YigUYxwEYrwEYkQLCAhAQLhiABBgUGIcCGMcBGK8BwgIIEC4YsQMYgATCAhAQLhgUGK8BGMcBGIcCGIAEwgIFEC4YgATCAh8QLhgUGK8BGMcBGIcCGIAEGJcFGNwEGN4EGOAE2AECwgIHEAAYgAQYCsICCBAAGIoFGIYDwgIfEC4YgAQYFBiHAhjHARivARiXBRjcBBjeBBjgBNgBAuIDBBgAIEGIBgG6BgYIARABGAu6BgYIAhABGBQ&sclient=gws-wiz-serp",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    },
    {
        "name": "DR MANOJ KUMAR K P ORAL & MAXILLOFACIAL CLINIC",
        "imageSrc": "img/un\"name\"d.jpg",
        "socialLinks": ["https://maps.app.goo.gl/PqMFZiGd7XfxUH6r9"],
        "location": "BILATHIKKULAM",
        "knowmorelink": "https://www.google.com/search?q=DR+MANOJ+KUMAR+K+P+&sca_esv=582496584&sxsrf=AM9HkKmehdtndkutRojWOWvIKZIcG42zuw%3A1700017875916&ei=0zZUZb_KN7KW4-EP6OK7yAI&ved=0ahUKEwj__-uMhMWCAxUyyzgGHWjxDikQ4dUDCBA&uact=5&oq=DR+MANOJ+KUMAR+K+P+&gs_lp=Egxnd3Mtd2l6LXNlcnAiE0RSIE1BTk9KIEtVTUFSIEsgUCAyBRAhGKABMgUQIRigATIFECEYoAEyBRAhGKABMgUQIRigAUjKJlD2CVjtH3ABeACQAQCYAb0EoAHoLaoBCjItMTEuNi4wLjK4AQPIAQD4AQGoAhTCAgcQIxjqAhgnwgIWEAAYAxiPARjlAhjqAhi0AhiMA9gBAcICFhAuGAMYjwEY5QIY6gIYtAIYjAPYAQHCAgQQIxgnwgIHEAAYigUYQ8ICCBAAGIoFGJECwgILEAAYgAQYsQMYgwHCAgUQABiABMICDRAuGIoFGMcBGK8BGEPCAgsQABiKBRixAxiDAcICCxAuGIAEGMcBGK8BwgIIEAAYgAQYsQPCAg4QABiKBRixAxiDARiRAsICEBAAGIAEGBQYhwIYsQMYgwHCAgsQLhivARjHARiABMICCBAuGIAEGLEDwgIREC4YgAQYsQMYgwEYxwEYrwHCAgoQABiABBgUGIcCwgIEECEYFcICCBAhGBYYHhgd4gMEGAAgQYgGAboGBggBEAEYCw&sclient=gws-wiz-serp",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    },
    {
        "name": "ZAHN DENTAL & MAXILLOFACIAL CENTRE",
        "imageSrc": "img/about-us.jpg",
        "socialLinks": ["https://maps.app.goo.gl/arS2Q6M9zcczu4wF9"],
        "location": "WEST NADAKAVU",
        "knowmorelink": "https://www.zahndentalcare.com/		",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    },
    {
        "name": "DR RUPALI'S DENTAL CLINIC",
        "imageSrc": "img/caroline-lm-JiBssiZVPZA-unsplash (1).jpg",
        "socialLinks": ["#"],
        "location": "OLD CORPORATION OFFICE",
        "knowmorelink": "https://www.justdial.com/Kozhikode/Dr-Roopali-Mahaswari-Near-Fire-Station-Calicut-Beach/0495PX495-X495-120502125757-W5B3DC_BZDET",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 0,
        "hasLiftAccess": 0
    },
    {
        "name": "MANDOLI'S DENTAL CLINIC",
        "imageSrc": "img/Screenshot (11).png",
        "socialLinks": ["https://maps.app.goo.gl/Y4UtURDuxyBbE1jw5"],
        "location": "PUTHIYARA",
        "knowmorelink": "https://www.google.com/search?q=mandoli+dental+clinic+calicut&oq=MANDOLI+DENTAL+CLINIC+&gs_lcrp=EgZjaHJvbWUqCggAEAAY4wIYgAQyCggAEAAY4wIYgAQyDQgBEC4YrwEYxwEYgAQyBggCEEUYOdIBCTQ3NDNqMGoxNagCALACAA&sourceid=chrome&ie=UTF-8",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 0,
        "hasLiftAccess": 1
    },
    {
        "name": "CHERUVANNUR MULTI SPECIALITY DENTAL CLINIC",
        "imageSrc": "img/oral-health.webp",
        "socialLinks": ["#"],
        "location": "CHERUVANNUR",
        "knowmorelink": "https://www.justdial.com/Kozhikode/Cheruvannur-Multi-Speciality-Dental-Clinic-Near-Karuna-Hospital-Cheruvannur/0495PX495-X495-181006124634-Y4F6_BZDET",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 0,
        "hasLiftAccess": 0
    },
    {
        "name": "ASTEN DENTAL, ASTEN ORTHOPAEDIC HOSPITAL",
        "imageSrc": "img/2021-10-28.jpg",
        "socialLinks": ["https://maps.app.goo.gl/oSKW3pdvcN5RqYiF8"],
        "location": "PANTHEERANKAVU",
        "knowmorelink": "https://astenortho.com/",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    },
    {
        "name": "DEPARTMENT OF DENTAL & FACIOMAXILLARY SURGERY, PVS – SUNRISE HOSPITAL",
        "imageSrc": "img/ada.webp",
        "socialLinks": ["https://maps.app.goo.gl/8nJcoBVX8W93igdt8"],
        "location": "RAILWAY STATION ROAD",
        "knowmorelink": "https://www.google.com/search?q=captaiin+dr+sudesh+g+pvs+hospital+calicut&sca_esv=582496584&sxsrf=AM9HkKk0QOnFRHLlgnUOdjbs6BbdN5-n1Q%3A1700018130123&ei=0jdUZcmPB4mP4-EPnZWduAM&oq=captaiin+dr+sudesh+G+pvs+hhopsipital+&gs_lp=Egxnd3Mtd2l6LXNlcnAiJWNhcHRhaWluIGRyIHN1ZGVzaCBHIHB2cyBoaG9wc2lwaXRhbCAqAggEMgcQIRigARgKMgcQIRigARgKMgcQIRigARgKMgcQIRigARgKMgcQIRigARgKSNBDUPUEWI8ocAF4AZABAZgBpQugAZpIqgENMi0xLjAuMS4wLjEuNrgBAcgBAPgBAcICChAAGEcY1gQYsAPCAgUQABiiBOIDBBgAIEGIBgGQBgg&sclient=gws-wiz-serp",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    },
    {
        "name": "DENTARIS DENTAL CLINIC",
        "imageSrc": "img/dentaris-dentistry-orthodontics-kozhikode-pgorqalvb6.avif",
        "socialLinks": ["https://maps.app.goo.gl/V6765orwiUja2m7m9"],
        "location": "MALAPARAMBA",
        "knowmorelink": "https://www.google.com/search?q=DR+CHANDINI++DENTARIS+DENTAL+CLINIC+MALAPARAMBA%2CKOZHIKODE&sca_esv=582530003&sxsrf=AM9HkKk1cgQCq91ovDDsSK4-_U-VLMVFHw%3A1700027780859&ei=hF1UZeSFNLLp4-EPp4a5qAQ&ved=0ahUKEwjk1_H_qMWCAxWy9DgGHSdDDkUQ4dUDCBA&uact=5&oq=DR+CHANDINI++DENTARIS+DENTAL+CLINIC+MALAPARAMBA%2CKOZHIKODE&gs_lp=Egxnd3Mtd2l6LXNlcnAiOURSIENIQU5ESU5JICBERU5UQVJJUyBERU5UQUwgQ0xJTklDIE1BTEFQQVJBTUJBLEtPWkhJS09ERTIFEAAYogQyBRAAGKIEMgUQABiiBDIFEAAYogRIm9UDUI6UA1j20gNwAngAkAEAmAHDBaAB4h2qAQ0wLjMuNi4yLjAuMS4xuAEDyAEA-AEBwgIIEAAYogQYsAPCAgQQIRgK4gMEGAEgQYgGAZAGBA&sclient=gws-wiz-serp",
        "hasWheelchairAccess": 1,
        "hasRampAccess": 1,
        "hasLiftAccess": 0
    }
]

# Assuming you have a MySQL connection established
conn = mysql.connector.connect(user='root', password='password', host='localhost', database='database')
cursor = conn.cursor()

# Insert data into the MySQL database
for clinic in clinic_data:
    sql = """
    INSERT INTO approved_registrations (name, imageSrc, socialLinks, location, knowmorelink, hasWheelchairAccess, hasRampAccess, hasLiftAccess)
    VALUES (%s, %s, %s, %s, %s, %s, %s, %s)
    """
    cursor.execute(sql, (
        clinic["name"],
        clinic["imageSrc"],
        json.dumps(clinic["socialLinks"]),  # Assuming socialLinks is a JSON array
        clinic["location"],
        clinic["knowmorelink"],
        clinic["hasWheelchairAccess"],
        clinic["hasRampAccess"],
        clinic["hasLiftAccess"]
    ))

# Commit the changes and close the connection
conn.commit()
conn.close()
