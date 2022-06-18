# このプログラムはTest_data/STS.output.images.txtとTest_data/STS.gs.image.txtのピアソン相関を求めて、
# MySQL上に登録するプログラム
import numpy as np
import MySQLdb

def get_sentences_score(file_path):
    scores = []
    with open(file_path) as f:
        for line in f.readlines():
            if line != '':
                scores.append(float(line[:-1]))
    return scores

# id, name, methodをSQLの1行に登録するなら、それを受け取れるように改良する必要あり！
def main():
    output = get_sentences_score('Test_data/STS.output.images.txt')
    gs = get_sentences_score('Test_data/STS.gs.images.txt')
    pearson = np.corrcoef(output, gs)[0, 1]
    
    connection = MySQLdb.connect(
        host='localhost',
        user='root',
        passwd='root',
        db='first_test_db')
    cursor = connection.cursor()
    cursor.execute(f'INSERT INTO users VALUES ({id}, {name}, {method}, {pearson})')
    connection.commit()
    connection.close()

if __name__=='__main__':
    main()
