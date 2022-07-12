from time import sleep
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from time import sleep

chrome_driver_path= "C:\Development\chromedriver.exe"
driver= webdriver.Chrome(executable_path = chrome_driver_path)

for x in range(1,51):
    driver.get("https://this-person-does-not-exist.com/pt")
    driver.maximize_window()
    imagem_link = driver.find_element(By.ID, 'avatar').get_attribute("src")

    import requests # request img from web
    import shutil # save img locally

    url = imagem_link #prompt user for img url
    file_name = f"{x}.png" #prompt user for file_name

    res = requests.get(url, stream = True)

    if res.status_code == 200:
        with open(file_name,'wb') as f:
            shutil.copyfileobj(res.raw, f)
        print('Image sucessfully Downloaded: ',file_name)
    else:
        print('Image Couldn\'t be retrieved')