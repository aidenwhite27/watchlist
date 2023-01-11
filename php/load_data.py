import mysql.connector
import pandas as pd
import os

cnx = mysql.connector.connect(user='b97078e238fb66', password='9e3c8562',
                                host='us-cdbr-east-06.cleardb.net',
                                database='heroku_5d3cbded229dc48'
)
cursor = cnx.cursor()
cnx.close()

movies = pd.read_csv('mymoviedb.csv')
print(movies.head())

for index, row in movies.iterrows():
    add_movies = '''INSERT INTO user(movieID, release_date, title, overview, popularity, vote_count,
                    vote_average, original_language, genre, poster_url
                VALUES ({0}, {1}, {2}, {3}, {4}, {5}, {6}, {7}, {8}, {9})'''.format(row["movieID"], row['Release_Date'], row['Title'], row['Overview'], row['Popularity'], row['Vote_Count'],
    row['Vote_Average'], row['Original_Language'], row['Genre'], row['Poster_Url'])

    cursor.execute(add_movies)

cnx.commit()
cursor.close()
cnx.close()