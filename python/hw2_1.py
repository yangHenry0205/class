import pandas as pd

df = pd.read_csv("./data/edu_bigdata_imp1.csv",encoding="big5",low_memory=False)

df_filtered = df[df["PseudoID"]==281]

unique_values = df_filtered.drop_duplicates(subset=['dp001_video_item_sn'])

print(unique_values[["dp001_video_item_sn","dp001_indicator"]])