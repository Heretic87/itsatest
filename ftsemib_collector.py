from bs4 import BeautifulSoup
import requests
import json

def parseTable(url):
    result = requests.get(url)

    soup = BeautifulSoup(result.text, 'html5lib')

    # per ogni tr estraggo solo qualche td

    prezzi = dict()

    for tr in soup.find_all('tr')[1:]:
        tds = tr.find_all('td')
        prezzi[tds[1].text.strip()] = (tds[2].text.strip(), tds[3].text.strip())

    return prezzi


def writeTradingData(res):
    with open("trading_data.json", 'a') as fp:
        json.dump(res, fp)
    return

def getUrlFromFile(filePointer):
    with open(filePointer, 'r') as fp:
        for l in fp:
            res = parseTable(l)
            writeTradingData(res)  
    return


getUrlFromFile('ciao.txt')
