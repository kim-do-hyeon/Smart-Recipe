#!/usr/bin/env python
# coding=utf8

import re
import os
import sys
import urllib.request
import json
import pprint
import string
import subprocess
import pymysql

def call_check(proc):
    if proc.wait() != 0:
        raise Exception('error')
        
        
def system(cmdline, output=True):
    args = cmdline.split()
    if output:
        proc = subprocess.Popen(args)
    else:
        FNULL = open(os.devnull, 'w')
        proc = subprocess.Popen(args, stdout=FNULL, stderr=subprocess.STDOUT, cwd=os.getcwd())
 
    try:
        call_check(proc)
    except Exception as err:
        err = format(err)

def search(dirname):
    filenames = os.listdir(dirname)
    for filename in filenames:
        full_filename = os.path.join(dirname, filename)
        ext = os.path.splitext(full_filename)[-1]
        if ext == '.jpg': 
            #print(full_filename)
            os.rename(full_filename,"/var/www/html/uploads/input.jpg")
        
        if ext == '.png': 
            #print(full_filename)
            os.rename(full_filename,"/var/www/html/uploads/input.jpg")
        
        if ext == '.JPG': 
            #print(full_filename)
            os.rename(full_filename,"/var/www/html/uploads/input.jpg")
            
        if ext == '.PNG': 
            #print(full_filename)
            os.rename(full_filename,"/var/www/html/uploads/input.jpg")
        
        if ext == '.jpeg': 
            #print(full_filename)
            os.rename(full_filename,"/var/www/html/uploads/input.jpg")

search("/var/www/html/uploads/")

#fpath = "/var/www/html/uploads/*.jpg"

system('rm /var/www/html/result.txt', output=False)
system('tesseract /var/www/html/uploads/input.jpg result -l lang0', output=False)
#system('tesseract /var/www/html/uploads/input.jpg result -l lang0+lang1+lang2+lang3+lang4+lang5+lang6+lang7+lang8+lang9', output=False)
f = open('result.txt','r')
s = f.read()
s = re.findall("\d+", s)
#print (s)
number_list = ["010","02", "031", "032", "033", "041", "042", "043", "044", "051", "052", "053", "054", "055", "061", "062", "063", "064"]

stop = 0


#temp = set(number_list)

#temp2 = []

#for each in number_list:
#    if each not in s:
#        temp2.append(each)

#other = temp - set(temp2)

#for each in other:
#        print("Translate Telephone : " + s[s.index(each): s.index(each)+10])

#test_number_case = s[s.index(each): s.index(each)+10]


for i in range(0, len(s)):
    for j in number_list:
        if s[i] == j:
            #print("=============== Translate Number : " + j + s[i+1] + s[i+2] + " ===============")
            temp_number_sucess = j+s[i+1]+s[i+2]
            stop = 1
            # end
    if stop :
        break
    
# Naver Search API
client_id = "SXB93CwjXqqNYXmXUNZt"
client_secret = "LEmsFT05r4"
encText = urllib.parse.quote(temp_number_sucess)
url = "https://openapi.naver.com/v1/search/local.json?query=" + encText
request = urllib.request.Request(url)
request.add_header("X-Naver-Client-Id",client_id)
request.add_header("X-Naver-Client-Secret",client_secret)
response = urllib.request.urlopen(request)
rescode = response.getcode()
if(rescode==200):
    response_body = response.read()
    #print(response_body.decode('utf-8'))
    result = json.loads(response_body.decode('utf-8'))
    print("=============================================================")
    print("========================Information==========================")
    print("=============================================================")
    print("상호명 : " + result['items'][0]['title'])
    print("전화번호 : " + result['items'][0]['telephone'])
    print("분류 : " + result['items'][0]['category'])
    print("주소 : " + result['items'][0]['address'])
    print("도로명 주소 : " + result['items'][0]['roadAddress'])
    
    sys.stdout = open('output.txt','w')
    print(result['items'][0]['title'])
    print(result['items'][0]['telephone'])
    print(result['items'][0]['category'])
    print(result['items'][0]['address'])
    print(result['items'][0]['roadAddress'])

else:
    print("Error Code :" + rescode)