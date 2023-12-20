
import pandas as pd
import datetime

df = pd.read_csv("./data/edu_bigdata_imp1.csv",encoding="big5",low_memory=False)

df_filtered = df["dp002_verb_display_zh_TW"].value_counts()

max= df_filtered.sort_values(ascending=False).head(3)

for i in max.keys():
    print(i)