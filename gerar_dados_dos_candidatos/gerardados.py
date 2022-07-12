from time import sleep
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from time import sleep
from random import choice,randint
import psycopg2

chrome_driver_path= "C:\Development\chromedriver.exe"
driver= webdriver.Chrome(executable_path = chrome_driver_path)

driver.get("https://www.4devs.com.br/gerador_de_pessoas")
driver.maximize_window()
driver.execute_script("window.scrollTo(0, 480)") 
for x in range(50):
    driver.find_element(By.ID, 'bt_gerar_pessoa').click()
    sleep(1)
    nome = driver.find_element(By.XPATH, '/html/body/main/div/div[2]/div/div[4]/div[1]/div[6]/div[1]/div[2]/div/span[1]').text
    data_de_nascimento = driver.find_element(By.XPATH, '/html/body/main/div/div[2]/div/div[4]/div[1]/div[6]/div[4]/div[2]/div/span[1]').text
    cidade = driver.find_element(By.XPATH, '/html/body/main/div/div[2]/div/div[4]/div[1]/div[6]/div[16]/div[2]/div/span[1]').text
    estado = driver.find_element(By.XPATH, '/html/body/main/div/div[2]/div/div[4]/div[1]/div[6]/div[17]/div[2]/div/span[1]').text

    descricao = f"{nome}, nascido em {data_de_nascimento} na cidade de {cidade}-{estado}. \nTem como prêmio mais memorável o {choice(['primeiro','segundo','terceiro'])} lugar no {choice(['Estadual','Nacional','Mundial'])} de Tênis de Mesa de {randint(2000,2021)}"

    conn = psycopg2.connect(database="gdxjmuix", host="kesavan.db.elephantsql.com", user="gdxjmuix", password="T0FVQa03cabOxs_S3oyzG00FwpEHlO97", port="5432")
    cursor = conn.cursor()
    cursor.execute("INSERT INTO competidores (id, name, descricao, points) VALUES (DEFAULT,%s,%s,%s)", (nome,descricao,randint(1,100)))
    conn.commit()